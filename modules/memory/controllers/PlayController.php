<?php

namespace app\modules\memory\controllers;

use yii\web\Controller;

class PlayController extends Controller
{
    public function actionIndex($type = null) {
        $cards = [];
        return $this->render('index', [
            'cards' => $cards,
        ]);
    }
}