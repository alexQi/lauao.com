<?php

namespace backend\modules\product\controllers;

use Yii;
use common\models\Orders;
use backend\models\OrdersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PHPExcel;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
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
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 学生资金变更记录
     */
    public function actionDataToExcel(){
        ini_set("memory_limit", "100M");
        set_time_limit(0);

        $Orders = new Orders();
        $data = $Orders->find()->where(['status'=>2])->asArray()->all();

        include "../../common/excel/PHPExcel.php";
        $objectPHPExcel = new PHPExcel();

        //设置表格头的输出
        $objectPHPExcel->setActiveSheetIndex()->setCellValue('A1', 'ID');
        $objectPHPExcel->setActiveSheetIndex()->setCellValue('B1', '订单编号');
        $objectPHPExcel->setActiveSheetIndex()->setCellValue('C1', '套餐');
        $objectPHPExcel->setActiveSheetIndex()->setCellValue('D1', '数量');
        $objectPHPExcel->setActiveSheetIndex()->setCellValue('E1', '总金额');
        $objectPHPExcel->setActiveSheetIndex()->setCellValue('F1', '渠道');
        $objectPHPExcel->setActiveSheetIndex()->setCellValue('G1', '购买人');
        $objectPHPExcel->setActiveSheetIndex()->setCellValue('H1', '手机');
        $objectPHPExcel->setActiveSheetIndex()->setCellValue('I1', '地址');
        $objectPHPExcel->setActiveSheetIndex()->setCellValue('J1', '邮费');
        $objectPHPExcel->setActiveSheetIndex()->setCellValue('K1', '购买时间');

        //指定开始输出数据的行数
        $n = 2;
        foreach ($data as $v){
            $objectPHPExcel->getActiveSheet()->setCellValue('A'.($n) ,$v['id']);
            $objectPHPExcel->getActiveSheet()->setCellValue('B'.($n) ,$v["order_id"]);
            $combo = '';
            if ($v['combo']==1){
                $combo = 'A.家庭装';
            }else if($v['combo']==2){
                $combo = 'B.尊享装';
            }else if($v['combo']==3){
                $combo = 'C.豪华装';
            }
            $objectPHPExcel->getActiveSheet()->setCellValue('C'.($n) ,$combo);
            $objectPHPExcel->getActiveSheet()->setCellValue('D'.($n) ,$v['num']);
            $objectPHPExcel->getActiveSheet()->setCellValue('E'.($n) ,$v['total_money']);
            $objectPHPExcel->getActiveSheet()->setCellValue('F'.($n) ,$v['channel']);
            $objectPHPExcel->getActiveSheet()->setCellValue('G'.($n) ,$v['name']);
            $objectPHPExcel->getActiveSheet()->setCellValue('H'.($n) ,$v['phone']);
            $objectPHPExcel->getActiveSheet()->setCellValue('I'.($n) ,$v['address']);
            if($v["is_postal"] == 1){
                $isPostal = '包邮';
            }else{
                $isPostal = '15元邮费';
            }
            $objectPHPExcel->getActiveSheet()->setCellValue('J'.($n) ,$isPostal);
            $objectPHPExcel->getActiveSheet()->setCellValue('K'.($n) ,date('Y-m-d H:i:s',$v['pay_time']));
            $n = $n +1;
        }
        ob_end_clean();
        ob_start();
        header('Content-Type : application/vnd.ms-excel');

        //设置输出文件名及格式
        header('Content-Disposition:attachment;filename="有效订单-'.date("YmdHis").'.xls"');

        //导出.xls格式的话使用Excel5,若是想导出.xlsx需要使用Excel2007
        $objWriter= \PHPExcel_IOFactory::createWriter($objectPHPExcel,'Excel5');
        $objWriter->save('php://output');
        ob_end_flush();

        //清空数据缓存
        unset($data);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
