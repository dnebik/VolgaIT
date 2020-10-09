<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AdminAppAsset;
use yii\helpers\Url;
use app\models\Cart;

AdminAppAsset::register($this);
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
    <?if (!Yii::$app->user->isGuest) {?>
    <a class="btn btn-success m-3" href="<?=Url::to('/admin/logout')?>">Выход из админки</a>
    <?}?>

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
