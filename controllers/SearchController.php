<?php


namespace app\controllers;
use app\models\Good;
use yii\web\Controller;

class SearchController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex($value = '')
    {
        $goods = Good::findAllLike($value);
        return $this->render('index', compact(['goods', 'value']));
    }
}