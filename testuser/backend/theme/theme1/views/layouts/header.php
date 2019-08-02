<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user.jpg" class="user-image" alt="User Image"/>
                        <?= Yii::$app->user->identity->student->firstname.' '.Yii::$app->user->identity->student->lastname?>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user.jpg" class="img-circle"
                                 alt="User Image"/>

                            <p>
                            <?= Yii::$app->user->identity->student->firstname.' '.Yii::$app->user->identity->student->lastname?>
                            </p>
                        </li>
                    
                        <!-- Menu Footer-->
                        <li class="user-footer">
                        
                        <div class="pull-left">
                                <?= Html::a(
                                    'หน้าหลัก',
                                    ['/site/index'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>


                            <div class="pull-right">
                                <?= Html::a(
                                    'ออกจากระบบ',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

        
            </ul>
        </div>
    </nav>
</header>
