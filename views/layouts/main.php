<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\models\Cart;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <span class="navbar-brand">Магазин</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" <?= Yii::$app->controller->id == 'site' ? 'active' : '' ?> href="<?=Url::to('site')?>">
                    Каталог</a>
                <a onclick="openCart(event)" class="nav-item nav-link" href="#">Корзина<span class="menu_quantity">
                        <?
                        $totalCount = Cart::getFullCount();
                        if ($totalCount) {
                            echo "($totalCount)";
                        }
                        ?>
                    </span></a>
                <?if (!Yii::$app->user->isGuest) {?>
                    <a class="nav-item nav-link" href="<?=Url::to('/admin')?>">Панель управления</a>
                <?}?>
                <?if (Yii::$app->user->isGuest) {?>
                    <a class="nav-item nav-link" href="<?=Url::to('/admin/login')?>">Вход в админку</a>
                <?} else {?>
                    <a class="nav-item nav-link" href="<?=Url::to('/admin/logout')?>">Выход из админки</a>
                <?}?>
                <form class="form-inline mx-sm-3 mb-2" action="<?= Url::to(['/search']) ?>" method="get">
                    <input class="form-control" type="text" style="padding: 5px" placeholder="Поиск..." name="value" required>
                    <button class="btn btn-success btn-search">Искать</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <?= $content ?>
    </div>
</div>

<footer class="footer text-center">
        ВолгаIT <span style="color: red">❤</span>
</footer>



<!-- CART -->
<div class="modal fade" id="cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>
<!-- END CART -->
<!-- ORDER -->
<div class="modal fade" id="order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>
<!-- END ORDER -->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
