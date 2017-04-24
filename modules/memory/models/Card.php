<?php

namespace app\modules\memory\models;

use yii\db\ActiveRecord;
use yii\helpers\Url;

class Card extends ActiveRecord
{
    /**
     * @var string
     */
    public $imageSrc;

    public static function tableName()
    {
        return 'memory_card';
    }

    public function rules()
    {
        return [
            [['filename', 'type'], 'required'],
        ];
    }

    /**
     * @return string
     */
    public function getImageSource() {
        $path = Url::to('images/memory/cards/' . $this->filename);
        $imageType = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $this->imageSrc = 'data:image/' . $imageType . ';base64,' . base64_encode($data);

        return $this->imageSrc;
    }
}