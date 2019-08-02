<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Department;
use common\models\Company;
use common\models\Program;
use common\models\Student;
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->student->firstname.' '.Yii::$app->user->identity->student->lastname?></p>
            </div>
        </div>


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'เมนู', 'options' => ['class' => 'header']],
                    ['label' => 'หน้าหลัก', 'icon' => 'fas fa-home', 'url' => ['/site/index']],
                    ['label' => 'ข้อมูลส่วนตัว', 'icon' => 'fas fa-users', 'url' => ['/studented/student/view','user_id'=> Yii::$app->user->identity->student->user_id,
                    'semester_id'=>Yii::$app->user->identity->student->semester_id]],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'ข้อมูลนักศึกษา',
                        'icon' => 'fas fa-users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'ข้อมูลนักศึกษา', 'icon' => 'fas fa-user', 'url' => ['/studented/student'],],
                            ['label' => 'เอกสารนักศึกษา', 'icon' => 'fas fa-file', 'url' => ['/studented/student'],],
                      /*      [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        */ ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
