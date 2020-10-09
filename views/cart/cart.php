<?php

use app\models\Cart;

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

    <? if (!$session['cart']) {?>
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
        <?
        $cart = $session['cart'];
        $i = 1;
        foreach ($cart as $id => $item) {?>
            <tr>
                <th scope="row"><?=$i++?></th>
                <td><?=$item['name']?></td>
                <td><?=$item['count']?></td>
                <td><?=$item['price']?></td>
                <td onclick="removeFromCart(event, <?= $id ?>)" class="delete"
                    style="text-align: center; cursor: pointer; vertical-align: middle; color: red; font-weight: 1000;">
                    <span>✕</span></td>
            </tr>
        <?}?>

            <tr style="border-top: 4px solid black">
                <td colspan="4">Всего товаров</td>
                <td class="total-quantity"><?= Cart::getFullCount(); ?></td>
            </tr>
            <tr>
                <td colspan="4">На сумму</td>
                <td style="font-weight: 700"><?= Cart::getFullPrice(); ?> рублей</td>
            </tr>
        </tbody>
    </table>
    <? } ?>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
    <button onclick="clearCart(event)" type="button" class="btn btn-danger" <?= (Cart::getFullPrice() == 0) ? 'disabled' : '' ?>>Очистить корзину</button>
    <button type="button" class="btn btn-primary" <?= !$cart ? 'disabled' : ''?>>Заказать</button>
</div>