<?php

namespace app\modules\memory\models;

use yii\db\ActiveRecord;

class Game extends ActiveRecord
{
    public static function tableName()
    {
        return 'memory_game';
    }

    public function rules()
    {
        return [
            [['player_id', 'cd'], 'required'],
        ];
    }
}