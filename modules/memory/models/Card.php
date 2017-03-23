<?php

namespace app\modules\memory\models;

use yii\db\ActiveRecord;

class Card extends ActiveRecord
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;
}