<?php

namespace restful\modules\system\controllers;

use restful\controllers\BaseController;
/**
 * Default controller for the `module` module
 */
class SiteController extends BaseController
{
    public function actionList()
    {
        return [
            'name'=>'zhangsan',
            'sex' =>'man'
        ];
    }
}
