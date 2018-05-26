<?php

namespace backend\modules\movie\controllers;

use Yii;
use common\models\VideoMember;
use common\models\VideoMemberSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MemberController implements the CRUD actions for VideoMember model.
 */
class MemberController extends Controller
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
     * Lists all VideoMember models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideoMemberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VideoMember model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new VideoMember model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \HttpInvalidParamException
     */
    public function actionCreate()
    {
        $model = new VideoMember();
        $p1 = $p2 = '';
        if ($model->load(Yii::$app->request->post())) {
            if ($model->avatar_url=='')
            {
                throw new \HttpInvalidParamException('文件未上传');
            }
            $model->created_at = date("Y-m-d H:i:s",time());
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {

            return $this->render('create', [
                'model' => $model,
                'p1'    => $p1,
                'p2'    => $p2
            ]);
        }
    }

    /**
     * Updates an existing VideoMember model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $p1[] = $model->avatar_url.'?'.yii::$app->params['qiniu']['style']['300x200'];
        $p2[] = [
            // 要删除商品图的地址
            'url' => Url::toRoute('/ajax/upload-file/ajax-delete'),
            'key' => substr($model->avatar_url,strlen($model->avatar_url)- 12,12),
        ];
        $poster = $model->avatar_url;
        if ($model->load(Yii::$app->request->post())) {

            if ($model->avatar_url=='')
            {
                $model->avatar_url = $poster;
            }
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'p1' => $p1,
                'p2' => $p2,
                'id' => $id,
            ]);
        }
    }

    /**
     * Deletes an existing VideoMember model.
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
     * Finds the VideoMember model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VideoMember the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VideoMember::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
