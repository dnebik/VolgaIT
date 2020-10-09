<?php

use app\widgets\Goods;
use app\models\Good;

/* @var $goods Good*/
/* @var $value string*/

$this->title = 'Поиск';
?>

<h1>Результат поиска по запросу "<?=$value?>"</h1>
    <br>

<? if ($goods) {
    Goods::begin(["goods" => $goods]);
    Goods::end();
} else { ?>
    <div class="alert alert-secondary" role="alert">
        <h2 class="">Мы ничего не нашли :c.</h2>
    </div>
<? } ?>