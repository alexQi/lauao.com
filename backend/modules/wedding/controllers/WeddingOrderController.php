<?php

namespace backend\modules\wedding\controllers;


use Yii;
use common\models\WeddingOrder;
use backend\models\WeddingItemOrderSearch;
use backend\models\WeddingComboSearch;
use backend\models\WeddingSectionSearch;
use backend\models\WeddingOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WeddingOrderController implements the CRUD actions for WeddingOrder model.
 */
class WeddingOrderController extends Controller {
    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all WeddingOrder models.
     *
     * @return mixed
     */
    public function actionIndex() {
        $searchModel  = new WeddingOrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WeddingOrder model.
     *
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WeddingOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate() {
        $model = new WeddingOrderSearch();

        $sections_model = WeddingSectionSearch::find()->all();

        $item_data_model = [];
        foreach ($sections_model as $key => $section) {
            $item_order_model               = new WeddingItemOrderSearch();
            $item_order_model->section_id   = $section->section_id;
            $item_order_model->section_name = $section->section_name;
            $item_order_model->combos       = WeddingComboSearch::find()
                ->where(['section_id' => $section->section_id])
                ->select(['combo_id','combo_name'])
                ->asArray()
                ->all();
            $item_data_model[] = $item_order_model;
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id    = yii::$app->user->id;
            $model->created_at = time();
            $model->updated_at = time();
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->order_id]);
            }
        } else {
            $model->wedding_date = date('Y-m-d', time() + 3 * 86400);
            return $this->renderAjax('create', [
                'model'           => $model,
                'item_data_model' => $item_data_model
            ]);
        }
    }

    /**
     * Updates an existing WeddingOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model             = $this->findModel($id);
        $model->updated_at = time();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->order_id]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing WeddingOrder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WeddingOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     * @return WeddingOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = WeddingOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
