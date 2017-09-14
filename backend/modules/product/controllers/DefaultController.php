<?php

namespace backend\modules\product\controllers;


use SebastianBergmann\CodeCoverage\Report\Html\File;
use Yii;
use app\models\Product;
use app\models\ProductSearch;
use app\models\UploadForm;
use app\models\Category;
use app\models\Files;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $files     = Files::find()->where(['product_id'=>$id])->asArray()->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'files' => $files
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $uploadModel = new UploadForm();
        $category =Category::find()->select('cate_id,cate_name')->all();

        $p1 = $p2 = $id = '';

        $param = Yii::$app->request->post();
        if ($model->load($param)){
            $model->create_time = time();
            if ($model->save()){

                //插入文件表
                $fileModel = new Files();
                $fileModel->product_id  = $model->product_id;
                $fileModel->file_type   = 1;  //图片类型
                $fileModel->create_time = time();
                foreach ($param['Product']['files'] as $file){
                    $fileModel->file_name = $file;
                    $fileModel->save();
                }
                return $this->redirect(['view', 'id' => $model->product_id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'uploadModel'=>$uploadModel,
                'category'=>$category,
                'p1' => $p1,
                'p2' => $p2,
                // 商品id
                'id' => $id,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $uploadModel = new UploadForm();
        $category =Category::find()->select('cate_id,cate_name')->all();
        $relationFiles = Files::find()->where(['product_id' => $id])->asArray()->all();
        $p1 = $p2 = [];
        if ($relationFiles) {
            foreach ($relationFiles as $k => $v) {
                $p1[$k] = '/upload/'.$v['file_name'];
                $p2[$k] = [
                    // 要删除商品图的地址
                    'url' => Url::toRoute('/product/ajax-delete'),
                    // 商品图对应的商品图id
                    'key' => $v['file_id'],
                ];
            }
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->product_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'uploadModel'=>$uploadModel,
                'category'=>$category,
                'p1' => $p1,
                'p2' => $p2,
                // 商品id
                'id' => $id,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
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
     * ajax 上传
     */
    public function actionAjaxUpload(){
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->files = UploadedFile::getInstances($model,'files');  //使用UploadedFile的getInstances方法接收多个文件
            $res = $model->upload();  //调用model里边的upload方法执行上传
            $err = $model->getErrors();  //获取错误信息
            if (!empty($err)){
                echo json_encode($err);
            }else{
                echo json_encode($res);
            }
        }
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
