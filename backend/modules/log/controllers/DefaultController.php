<?php

namespace backend\modules\log\controllers;

use Yii;
use backend\models\AdminLog;
use backend\models\AdminLogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminLogController implements the CRUD actions for AdminLog model.
 */
class DefaultController extends Controller {
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
     * Lists all AdminLog models.
     *
     * @return mixed
     */
    public function actionIndex() {
        $searchModel  = new AdminLogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AdminLog model.
     *
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $logModel = AdminLog::find()->joinWith(['userExtend'])->where(['id' => $id])->asArray()->one();
        $thList   = $oldDataList = $newDataList = [];
        $rawData  = json_decode($logModel['raw_data'], true);
        $currData = json_decode($logModel['current_data'], true);
        if ($rawData) {
            foreach ($rawData as $key => $val) {
                $thList[]      = $key;
                $oldDataList[] = $val;
            }
        }
        if ($currData) {
            foreach ($currData as $key => $val) {
                $newDataList[] = $val;
            }
        }
        return $this->renderAjax('view', [
            'logModel'    => $logModel,
            'thList'      => $thList,
            'oldDataList' => $oldDataList,
            'newDataList' => $newDataList,
        ]);
    }

    /**
     * Finds the AdminLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     * @return AdminLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = AdminLog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
