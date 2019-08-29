<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'เข้าสู่ระบบ';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
.header_login {
  background-color: #85C1E9;
  margin:0px;
  padding: 20px;
  text-align: center;
}
.login_form {
  border-radius: 5px;
  background-color: #f2f2f2;
  width: 40%;
  border: 1px solid #85C1E9;
}

.input_login {
  padding: 20px;
  width: 80%;
}
</style>

<center>
<div class="login_form">
    <h2 class="header_login"><?= Html::encode($this->title) ?></h2>

    <div class="row input_login">
        <div class="col-lg-12 ">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</center>
