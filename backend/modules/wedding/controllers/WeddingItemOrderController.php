<?php

namespace backend\modules\wedding\controllers;


use backend\models\WeddingComboSearch;
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
        $searchModel  = new WeddingItemOrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
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
        $item_data_model = WeddingItemOrderSearch::find()->alias('wios')->leftJoin(WeddingCombo::tableName() . ' wc', 'wc.combo_id=wios.combo_id')->leftJoin(WeddingSectionSearch::tableName() . 'wss', 'wss.section_id=wios.section_id')->where(['item_order_id' => $id])->select('wios.*,wc.combo_name,wss.section_name')->one();
        $model           = WeddingOrderSearch::findOne($item_data_model->order_id);

        if ($model->project_process == 1)
        {
            $star                   = substr($model->customer_mobile, 3, 4);
            $model->customer_mobile = str_replace($star, '****', $model->customer_mobile);
        }

        return $this->render('view', [
            'model'           => $model,
            'item_data_model' => $item_data_model,
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
            if ($item_data_model->principal != '' && $item_data_model->save())
            {
                return $this->redirect([
                    'view',
                    'id' => $item_data_model->item_order_id,
                ]);
            }
            else
            {
                if ($item_data_model->principal == '')
                {
                    $item_data_model->addError('principal', '负责人不能为空');
                }
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
