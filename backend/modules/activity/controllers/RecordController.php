<?php

namespace backend\modules\activity\controllers;

use Yii;
use common\models\ApplyRecord;
use backend\models\ApplyRecordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RecordController implements the CRUD actions for ApplyRecord model.
 */
class RecordController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ApplyRecord models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApplyRecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing ApplyRecord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionAudit($id)
    {
        $model = $this->findModel($id);

        if (yii::$app->request->get('status')){
            $model->status = yii::$app->request->get('status');
            $message = $model->status==2 ? '审核完成':'拒绝该用户成功';
            if ($model->save()){
                \Yii::$app->getSession()->setFlash('success', $message);
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the ApplyRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ApplyRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ApplyRecord::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
