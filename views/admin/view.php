<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'address',
            'sum',
            'date',
            'status',
        ],
    ]) ?>

    <hr>

    <h3>Состав заказа</h3>

    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th style="padding: 8px; border: 1px solid #ddd">Наименование</th>
            <th style="padding: 8px; border: 1px solid #ddd">Количество</th>
            <th style="padding: 8px; border: 1px solid #ddd">Цена</th>
            <th style="padding: 8px; border: 1px solid #ddd">Сумма</th>
        </tr>
        </thead>
        <tbody>

        <?
        $goods = $model->orderGoods;
        foreach ($goods as $good) {
            ?>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd"><?= $good['name'] ?></td>
                <td style="padding: 8px; border: 1px solid #ddd"><?= $good['quantity'] ?></td>
                <td style="padding: 8px; border: 1px solid #ddd"><?= $good['price'] ?> рублей</td>
                <td style="padding: 8px; border: 1px solid #ddd"><?= $good['price'] * $good['quantity'] ?> рублей</td>
            </tr>
        <? } ?>

        </tbody>
    </table>

</div>
