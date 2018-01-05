<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link rel="stylesheet" type="text/css" href="<?=Yii::$app->homeUrl?>vendor/open-iconic-master/font/css/open-iconic-bootstrap.css">

    <base href="<?=Yii::$app->homeUrl?>">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111944812-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-111944812-1');
    </script>


</head>
<body>


<?php $this->beginBody() ?>

<?php $this->endBody() ?>

<script type="text/javascript" src="<?=Yii::$app->homeUrl?>vendor/bootstrap/js/bootstrap.bundle.js"></script>


<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="<?=Yii::$app->homeUrl?>"><?=Yii::$app->name?></a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

            <?php echo(
            Yii::$app->user->isGuest ? '' : 
                '<li class="nav-item">'
                . "<a class='nav-link' href='" . Yii::$app->homeUrl . "user-home'>Home</a>"
                .'</li>'
            );
        ?>

        

      
        <?php echo(
            Yii::$app->user->isGuest ? '' : 
                '<li class="nav-item">'
                . "<a class='nav-link' href='" . Yii::$app->homeUrl . "propiedad-wizard'>Agregar propiedad</a>"
                .'</li>'
            );
        ?>

        <?php echo(
            !Yii::$app->user->isGuest ? '' : 
                '<li class="nav-item">'
                . "<a class='nav-link' href='" . Yii::$app->homeUrl . "usuarios/create'>Crear una cuenta</a>"
                .'</li>'
            );
        ?>

        <li class="nav-item">
        <?php echo(
            Yii::$app->user->isGuest ? (
                "<a class='nav-link' href='" . Yii::$app->homeUrl . "site/login'>Entrar</a>"
            ) : (
                Html::beginForm([  'site/logout'], 'post')
                . Html::submitButton(
                    'Salir',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
            );
            ?>
      </li>

        </ul>
        
      </div>
    </nav>

     <div class="container">

<div class="row">
    <div class="col-md-10">
    <?= $content ?>
    </div>
</div>
    </div>


    <footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Inicio</h5>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="<?=Yii::$app->homeUrl?>usuarios/create">Crear una cuenta</a></li>
                        <li><a href="<?=Yii::$app->homeUrl?>site/login">Entrar</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="index.php?">Terminos y condiciones</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 info">
                    <h5>Información</h5>
                    <p> Pubica tu casa, departameto o terreno para que tus clientes te puedan encontrar facilmente. </p>
                </div>
            </div>
        </div>
        
    </footer>

</body>
</html>
<?php $this->endPage() ?>
