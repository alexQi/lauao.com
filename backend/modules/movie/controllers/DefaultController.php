<?php

namespace backend\modules\movie\controllers;

use backend\models\VideoCategorySearch;
use Yii;
use common\models\Video;
use backend\models\VideoSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for Video model.
 */
class DefaultController extends Controller
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
     * Lists all Video models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $videoCategory = VideoCategorySearch::find()->select(['id','cate_name'])->asArray()->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'vCate' => $videoCategory
        ]);
    }

    /**
     * Creates a new Video model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws
     */
    public function actionCreate()
    {
        $model = new Video();
        $p1 = $p2 = '';
        if ($model->load(Yii::$app->request->post())) {
            if ($model->poster=='')
            {
                throw new \HttpInvalidParamException('文件未上传');
            }
            $model->created_at = date("Y-m-d H:i:s",time());
            $model->updated_at = date("Y-m-d H:i:s",time());
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->video_id]);
            }
        } else {
            $videoCategory = VideoCategorySearch::find()->select(['id','cate_name'])->asArray()->all();

            return $this->render('create', [
                'model' => $model,
                'vCate' => $videoCategory,
                'p1'    => $p1,
                'p2'    => $p2
            ]);
        }
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $p1[] = $model->poster.'?'.yii::$app->params['qiniu']['style']['300x200'];
        $p2[] = [
            // 要删除商品图的地址
            'url' => Url::toRoute('/ajax/upload-file/ajax-delete'),
            'key' => substr($model->poster,strlen($model->poster)- 12,12),
        ];
        $poster = $model->poster;
        if ($model->load(Yii::$app->request->post())) {

            if ($model->poster=='')
            {
                $model->poster = $poster;
            }
            $model->created_at = date("Y-m-d H:i:s",time());
            $model->updated_at = date("Y-m-d H:i:s",time());
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->video_id]);
            }
        } else {
            $videoCategory = VideoCategorySearch::find()->select(['id','cate_name'])->asArray()->all();
            return $this->render('update', [
                'model' => $model,
                'vCate' => $videoCategory,
                'p1' => $p1,
                'p2' => $p2,
                'id' => $id,
            ]);
        }
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Video model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Video the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Video::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
