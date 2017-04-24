<?php

namespace app\modules\memory\controllers;

use app\controllers\BaseController;
use app\modules\memory\models\CardSearch;
use yii\base\ErrorException;

class PlayController extends BaseController
{
    public function actionIndex($type = null) {
        $cardSearch = new CardSearch();

        $allCards = $cardSearch->search(['type' => $type]);

        if(count($allCards->models) < 10) {
            throw new ErrorException('Not enough different cards to play!');
        }

        $cardKeys = array_rand($allCards->models, 10);

        $cards = [];
        foreach($cardKeys as $cardKey) {
            $cards[] = $allCards->models[$cardKey];
        }

        $usedKeys = [];
        $playCards = array_fill(0, 20, NULL);
        foreach($cards as $card) {
            for($i = 0; $i < 2; $i++) {
                $key = rand(0, 19);
                while(in_array($key, $usedKeys)) {
                    $key = rand(0, 19);
                }
                array_push($usedKeys, $key);
                $playCards[$key] = $card;
            }
        }

        return $this->render('index', [
            'cards' => $playCards,
        ]);
    }
}