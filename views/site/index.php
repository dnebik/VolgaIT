<?php

/* @var $this yii\web\View */
/* @var $this yii\web\View */

$this->title = 'Каталог';
?>

<? if ($goods) {
    Goods::begin(["goods" => $goods]);
    Goods::end();
} else { ?>
    <div class="alert alert-secondary" role="alert">
        <h2 class="">Каталог пуст.</h2>
    </div>
<? } ?>