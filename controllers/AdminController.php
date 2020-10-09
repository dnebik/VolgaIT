<?php


namespace app\controllers;


use app\models\LoginForm;
use app\models\Order;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

class AdminController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionLogin()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find(),
        ]);

        $this->layout = "admin_layout";

        if (!Yii::$app->user->isGuest) {
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }

        $model = new LoginForm();
        error_log(print_r($model, true));
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionIndex()
    {
        $this->layout = "admin_layout";
        if (Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Order::find(),
            'sort' => [
                'defaultOrder' => [
                    'status' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $this->layout = "admin_layout";
        if (Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        $this->layout = "admin_layout";
        if (Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->layout = "admin_layout";
        if (Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}