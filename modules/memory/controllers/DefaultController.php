<?php

namespace app\modules\memory\controllers;

use app\controllers\BaseController;
use Yii;

class DefaultController extends BaseController
{

    public function actionIndex() {
        return $this->render('index');
    }
}