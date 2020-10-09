<?php

use yii\helpers\Url;
use app\models\Good;

/* @var $goods Good*/

?>

<div class="container">
    <div class="row justify-content-center mb-5">
        <? foreach ($goods as $good) { ?>
            <div class="col-4">
                <div class="product">
                    <div class="product-name"><?= $good->name ?></div>
                    <div class="product-descr"><?= $good->description ?></div>
                    <div class="product-price">Цена: <?= $good->price ?> рублей</div>
                    <div class="product-buttons">
                        <a href=""  data-name="<?= $good->id ?>" type="button" class="product-button__add btn btn-success">Заказать</a>
                    </div>
                </div>
            </div>
        <? } ?>
    </div>
</div>