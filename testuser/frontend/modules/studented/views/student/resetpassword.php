<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Student */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'แก้ไข : ' . ' ' . $model->firstname.' '.$model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'นักศึกษา', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->firstname.' '.$model->lastname, 'url' => ['profile', 'user_id' => $model->user_id, 'semester_id' => $model->semester_id]];
$this->params['breadcrumbs'][] = 'แก้ไขรหัสผ่าน';
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($user, 'password_hash')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>