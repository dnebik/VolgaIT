<?php


namespace app\controllers;


use app\models\OrderGood;
use yii\web\Controller;
use Yii;
use app\models\Good;
use app\models\Cart;
use yii\helpers\Url;
use app\models\Order;

class CartController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    public function actionOrder(){
        $session = Yii::$app->session;
        $session->open();

        if (!$session["cart"]) {
            return Yii::$app->response->redirect(Url::to("/"));
        }

        $order = new Order();
        if ($order->load(Yii::$app->request->post())) {
            $order->sum = Cart::getFullPrice();
            if ($order->save()) {
                $id = $order->id;
                OrderGood::saveOrderInfo($session['cart'], $id);
                $session->remove('cart');
                return $this->render('success', compact(['id']));
            }
        }

        $this->layout = 'empty_layout';
        return $this->render('order', compact(['order']));
    }

    public function actionOpen()
    {
        $session = Yii::$app->session;
        $session->open();

        return $this->renderPartial("cart", compact('session'));
    }

    public function actionAdd($id)
    {
        $good = Good::getByIdentity($id);

        $session = Yii::$app->session;
        $session->open();

        Cart::addToCart($good);

        return $this->renderPartial("cart", compact('session'));
    }

    public function actionClear() {
        $session = Yii::$app->session;
        $session->open();

        Cart::clearCart();

        return $this->renderPartial("cart", compact('session'));
    }

    public function actionRemove($id) {

        $good = Good::getByIdentity($id);

        $session = Yii::$app->session;
        $session->open();

        Cart::removeFromCart($good);

        return $this->renderPartial("cart", compact('session'));
    }

}