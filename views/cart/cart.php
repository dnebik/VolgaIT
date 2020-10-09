<?php

if (isset($session['cart'])) {
    $cart = $session['cart'];
}
?>


<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">

    <? if (!$cart) {?>
        <div class="alert alert-secondary" role="alert">
            <h3>Корзина пуста!</h3>
        </div>
    <?} else {?>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование</th>
            <th scope="col">Количество</th>
            <th scope="col">Цена</th>
            <th scope="col"></th>
        </tr>
        </thead>

        <tbody>
            <tr>
                <th scope="row"></th>
                <td>sad</td>
                <td>sad</td>
                <td>da</td>
                <td>sdag</td>
            </tr>
        </tbody>
    </table>
    <? } ?>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
    <button type="button" class="btn btn-primary" <?= !$cart ? 'disabled' : ''?>>Заказать</button>
</div>