<?php

use yii\helpers\Url;

$this->title = 'Memory'
?>
<div class="game-container">
    <div class="jumbotron">
        <h1>Memory</h1>
        <h3>Select a category below</h3>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <h2>Cars</h2>
                <p><a class="btn btn-default" href="<?= Url::toRoute(['/memory/play', 'type' => 'cars'])?>">Play &raquo;</a></p>
            </div>
        </div>
    </div>
</div>