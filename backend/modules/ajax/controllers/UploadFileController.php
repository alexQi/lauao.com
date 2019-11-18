<?php
namespace backend\modules\ajax\controllers;

use backend\modules\admin\models\form\Signup;
use yii;
use yii\base\Exception;
use common\components\MyQiniu;
use yii\web\UploadedFile;

class UploadFileController extends BaseController
{
    /**
     * ajax 上传
     */
    public function actionUpload(){
        try{
            if (!yii::$app->request->get('fileClass'))
            {
                throw new Exception('fileClass 未定义');
            }
            if (!yii::$app->request->get('bucket'))
            {
                throw new Exception('Bucket 未定义');
            }

            $fileFormName = yii::$app->request->get('fileClass').'[tempFileUrl][0]';

            $uploadFile = UploadedFile::getInstanceByName($fileFormName);

            if (!$uploadFile){
                throw new Exception('未检测到上传文件');
            }

            $bucket = yii::$app->request->get('bucket');
            $qiniu = new MyQiniu($bucket);
            $key = 'QB'.time();
            $result  = $qiniu->uploadFileGetReturn($uploadFile->tempName,$key);
            if (!$result){
                throw new Exception('上传文件失败');
            }

            $result['file_url'] = $qiniu->getLink($result['key']);

            $this->ajaxReturn['state']   = 1;
            $this->ajaxReturn['message'] = '上传成功';
            $this->ajaxReturn['data']  = $result;
        }catch(Exception $e){
            $this->ajaxReturn['message'] = $e->getMessage();
        }
        return $this->ajaxReturn;
    }

    public function actionDelete()
    {
        try{
            if (!yii::$app->request->get('bucket'))
            {
                throw new Exception('Bucket未定义');
            }
            if (!yii::$app->request->post('key'))
            {
                throw new Exception('参数错误');
            }
            $bucket = yii::$app->request->get('bucket');
            $qiniu = new MyQiniu($bucket);
            $result  = $qiniu->delete(yii::$app->request->post('key'));
            if (!$result){
                throw new Exception('删除失败');
            }

            $this->ajaxReturn['state']   = 1;
            $this->ajaxReturn['message'] = '删除成功';
            $this->ajaxReturn['data']  = $result;
        }catch(Exception $e){
            $this->ajaxReturn['message'] = $e->getMessage();
        }
        return $this->ajaxReturn;
    }
}