<?php

namespace app\modules\memory\assets;

use yii\web\AssetBundle;

class MemoryAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@app/modules/memory/assets/';

    /**
     * @var array
     */
    public $css = [
        'css/memory.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'js/memory.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}