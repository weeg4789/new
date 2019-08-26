<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Student */

$this->title = $model->firstname.' '.$model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'นักศึกษา', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ไข้ข้อมูลสถานสหกิจ', ['updatecompany', 'user_id' => $model->user_id, 'semester_id' => $model->semester_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('แก้ไขรหัสผ่าน', ['resetpassword', 'user_id' => $model->user_id, 'semester_id' => $model->semester_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'user.username',
            'user.email',
            'std_code',
            'firstname',
            'lastname',
            'phone',
            'semester.semester',
            'program.name',
            'program.department.name',
            'company.namecompany',
        ],
    ]) ?>

</div>
