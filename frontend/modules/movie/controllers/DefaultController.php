<?php
namespace frontend\modules\movie\controllers;

use common\models\Pay\ApiService;
use common\models\Orders;
use common\models\Pay\Wechat;
use common\models\ActivityBase;
use Yii;
use frontend\controllers\BaseController;
use frontend\models\ApplyUserService;
use yii\web\ForbiddenHttpException;

/**
 * Site controller
 */
class DefaultController extends BaseController
{
    public $layout = false;
    public $enableCsrfValidation = false;
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
	    return $this->render('index',[

        ]);
    }

    public function actionDiscover()
    {
        return $this->render('discover');
    }

    public function actionDetail()
    {
        return $this->render('detail');
    }
}
