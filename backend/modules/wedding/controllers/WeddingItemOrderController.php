<?php

namespace backend\modules\wedding\controllers;


use backend\models\WeddingComboSearch;
use common\models\WeddingSection;
use Yii;
use common\models\WeddingItemOrder;
use common\models\WeddingCombo;
use backend\models\WeddingSectionSearch;
use backend\models\WeddingOrderSearch;
use backend\models\WeddingItemOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use moonland\phpexcel\Excel;
use app\models\UserSearch;

/**
 * WeddingItemOrderController implements the CRUD actions for WeddingItemOrder model.
 */
class WeddingItemOrderController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all WeddingItemOrder models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $user_info       = UserSearch::getUserInfo(yii::$app->user->identity->getId());
        $user_section_id = $user_info ? $user_info['section'] : -1;

        $searchModel   = new WeddingItemOrderSearch();
        $dataProvider  = $searchModel->search(Yii::$app->request->queryParams);
        $section_model = WeddingSection::find()->where(['section_id' => $user_section_id])->one();

        if ($section_model){
            $section_name = $section_model->section_name;
        }else{
            $section_name = '';
        }
        return $this->render('index', [
            'searchModel'   => $searchModel,
            'dataProvider'  => $dataProvider,
            'section_names' => $section_name,
        ]);
    }

    /**
     * Displays a single WeddingItemOrder model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        $item_data_model = WeddingItemOrderSearch::find()
            ->alias('wios')
            ->leftJoin(WeddingCombo::tableName() . ' wc', 'wc.combo_id=wios.combo_id')
            ->leftJoin(WeddingSectionSearch::tableName() . 'wss', 'wss.section_id=wios.section_id')
            ->where(['item_order_id' => $id])
            ->select('wios.*,wc.combo_name,wss.section_name')
            ->one();
        $model           = WeddingOrderSearch::findOne($item_data_model->order_id);

        if ($model->project_process == 1)
        {
            $star                   = substr($model->customer_mobile, 3, 4);
            $model->customer_mobile = str_replace($star, '****', $model->customer_mobile);

            $name_length = mb_strlen($model->customer_name, 'utf-8');
            $surname     = mb_substr($model->customer_name, 0, 1, 'utf-8');

            $model->customer_name = $surname . str_repeat('*', ($name_length - 1));
        }

        return $this->render('view', [
            'model'           => $model,
            'item_data_model' => $item_data_model,
        ]);
    }

    /**
     * 导出Excel
     */
    public function actionExportExcel()
    {
        //$main_order = WeddingItemOrderSearch::find()->all();

        $user_info       = UserSearch::getUserInfo(yii::$app->user->identity->getId());
        $user_section_id = $user_info ? $user_info['section'] : -1;
        $main_order      = WeddingItemOrderSearch::find()
            ->alias('wio')
            ->leftJoin(WeddingOrderSearch::tableName() . ' wos', 'wos.order_id=wio.order_id')
            ->leftJoin(WeddingSectionSearch::tableName() . ' wss', 'wss.section_id=wio.section_id')
            ->leftJoin(WeddingComboSearch::tableName() . ' wcs', 'wcs.combo_id=wio.combo_id')
            ->where(['wio.section_id' => $user_section_id])
            ->select([
                'wio.*',
                'wos.order_sn',
                'wos.customer_name',
                'wos.project_process',
                'wos.customer_mobile',
                'wos.wedding_date',
                'wos.wedding_address',
                'wcs.combo_name',
            ])
            ->all();

       // $models = WeddingOrderSearch::findOne($main_order->order_id);//找到主订单状态


        return Excel::export([
            'isMultipleSheet' => false,
            'fileName'        => '子部门订单-' . date('Y-m-d') . '.xlsx',
            'format'          => 'Excel2007',
            'models'          => $main_order,
            'columns'         => [
                'order_sn',

                //'customer_name',
                ['attribute' => 'customer_name',
                    'format'    => 'text',
                    'value'     => function($main_order)
                    {
                        if($main_order->project_process == 1)
                        {
                            $name_length = mb_strlen($main_order->customer_name, 'utf-8');
                            $surname     = mb_substr($main_order->customer_name, 0, 1, 'utf-8');

                             $main_order->customer_name = $surname . str_repeat('*', ($name_length - 1));
                        }
                        return $main_order->customer_name;

                    },
                ],
                ['attribute' => 'customer_mobile',
                    'format'    => 'text',
                    'value'     => function($main_order)
                    {
                        if($main_order->project_process == 1)
                        {
                             $star = substr($main_order->customer_mobile, 3, 4);
                             $main_order->customer_mobile = str_replace($star, '****', $main_order->customer_mobile);

                        }
                        return $main_order->customer_mobile;

                    },
                ],
                'wedding_date:date',
                'wedding_address',
                //'combo_name',
                ['attribute' => 'combo_name',
                    'format'    => 'text',
                    'value'     => function($main_order)
                    {
                        if($main_order->combo_id == -1)
                        {

                            $main_order->combo_name ='无套餐';

                        }
                        return $main_order->combo_name;

                    },
                ],
                'deal_price',
                [
                    'attribute' => 'status',
                    'format'    => 'text',
                    'value'     => function($main_order)
                    {
                        switch ($main_order->status)
                        {
                            case 0:
                                $string = '未接单';
                                break;
                            case 1:
                                $string = '已接单';
                                break;

                            default:

                        }
                        return $string;
                    },
                ],
                'principal',
                [
                    'header'    => '下单日期',
                    'attribute' => 'created_at',
                    'format'    => 'datetime',
                ],

                [
                    'header'    => '更新日期',
                    'attribute' => 'updated_at',
                    'format'    => 'datetime',
                ],
            ],
        ]);
    }


    /**
     * Updates an existing WeddingItemOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $item_data_model = $this->findModel($id);

        if ($item_data_model->load(Yii::$app->request->post()))
        {
            $item_data_model->updated_at = time();
            if (Yii::$app->request->post('submit-button') == 'submit')
            {
                if ($item_data_model->save())
                {
                    return $this->redirect([
                        'view',
                        'id' => $item_data_model->item_order_id,
                    ]);
                }
            }
            else
            {
                $item_data_model->validate();
                if ($item_data_model->principal == '')
                {
                    $item_data_model->addError('principal', '负责人不能为空');
                }
                $result = [];
                foreach ($item_data_model->getErrors() as $attribute => $errors)
                {
                    $result[Html::getInputId($item_data_model, $attribute)] = $errors;
                }
                return json_encode($result);
            }
        }
        else
        {
            $model = WeddingOrderSearch::findOne($item_data_model->order_id);
            if ($model->project_process == 1)
            {
                $star                   = substr($model->customer_mobile, 3, 4);
                $model->customer_mobile = str_replace($star, '****', $model->customer_mobile);
            }
            $all_combos = WeddingComboSearch::find()->where(['combo_id' => $item_data_model->combo_id])->select([
                'combo_id',
                'combo_name',
            ])->asArray()->all();
            array_unshift($all_combos, [
                'combo_id'   => -1,
                'combo_name' => '无套餐',
            ]);
            $item_data_model->combos = $all_combos;

            return $this->renderAjax('update', [
                'model'           => $model,
                'item_data_model' => $item_data_model,
            ]);
        }
    }

    /**
     * Finds the WeddingItemOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return WeddingItemOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WeddingItemOrderSearch::findOne($id)) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
