<?php


namespace app\controllers;


use yii\web\Controller;

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

        return $this->renderPartial("cart", ['session' => $session]);
    }

}