<?php
use app\models\Order;
use yii\widgets\ActiveForm;

/* @var $order Order */
?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Оформление заказа</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<? $form = ActiveForm::begin() ?>
<div class="modal-body">
    <?= $form->field($order, 'address') ?>
</div>

<div class="modal-footer">
    <button class="btn btn-success">Оформить</button>
</div>
<? ActiveForm::end() ?>
