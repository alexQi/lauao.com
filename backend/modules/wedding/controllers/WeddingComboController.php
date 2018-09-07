<?php

namespace backend\modules\wedding\controllers;

use common\models\WeddingSection;
use Yii;
use common\models\WeddingCombo;
use backend\models\WeddingComboSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WeddingComboController implements the CRUD actions for WeddingCombo model.
 */
class WeddingComboController extends Controller
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
     * Lists all WeddingCombo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WeddingComboSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WeddingCombo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $logModel = WeddingCombo::find()->joinWith(['userExtend'])->where(['combo_id' => $id])->one();

        return $this->render('view', [

            'model' => $logModel,//$this->findModel($id),
        ]);
    }

    /**
     * Creates a new WeddingCombo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WeddingCombo();
        $model->user_id = yii::$app->user->id;
        $model->created_at = time();
        $model->updated_at = time();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->combo_id]);
        } else {
            $sections = WeddingSection::find()->select(['section_id','section_name'])->asArray()->all();
            return $this->renderAjax('create', [
                'model' => $model,
                'sections' => $sections
            ]);
        }
    }

    /**
     * Updates an existing WeddingCombo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->combo_id]);
        } else {
            $sections = WeddingSection::find()->select(['section_id','section_name'])->asArray()->all();
            return $this->renderAjax('update', [
                'model' => $model,
                'sections'=>$sections
            ]);
        }
    }

    /**
     * Deletes an existing WeddingCombo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WeddingCombo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WeddingCombo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WeddingCombo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
