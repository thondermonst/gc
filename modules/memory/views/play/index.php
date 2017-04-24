<?php

use yii\helpers\Html;
use app\modules\memory\assets\MemoryAsset;

$this->title = 'Memory';
?>
<div class="game-container">
    <div class="jumbotron">
        <h1>Memory</h1>
        <h3>Find the pairs of cars.</h3>
    </div>
    <div class="actions">
        <button id="start-button" class="btn btn-lg btn-success">Start</button>
    </div>
    <div class="body-content">
        <div class="row">
            <table id="play-table" class="table">
            <?php $rowCounter = 0; ?>
            <?php $columnCounter = 0; ?>
            <?php /* @var \app\modules\memory\models\Card $card */?>
            <?php foreach ($cards as $card) : ?>
                <?php $columnCounter++; ?>
                <?php if($columnCounter == 0) : ?>
                    <?php $rowCounter++; ?>
                    <tr id="row-<?= $rowCounter; ?>">
                <?php endif; ?>
                        <td id="column-<?= $rowCounter; ?>-<?= $columnCounter; ?>" class="column closed-column">
                            <img class="card-image" src="<?= $card->getImageSource() ?>" />
                            <div class="mask-image"></div>
                        </td>
                <?php if($columnCounter == 5) : ?>
                    </tr>
                    <?php $columnCounter = 0; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            </table>
            <div id="hidden-info">
                <span id="card-info"></span>
            </div>
        </div>
    </div>
</div>
<?php
MemoryAsset::register($this);
?>