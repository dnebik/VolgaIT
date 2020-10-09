<?php


namespace app\controllers;


use yii\web\Controller;
use Yii;
use app\models\Good;
use app\models\Cart;

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

    public function actionRemove($id) {

        $good = Good::getByIdentity($id);

        $session = Yii::$app->session;
        $session->open();

        Cart::removeFromCart($good);

        return $this->renderPartial("cart", compact('session'));
    }

}