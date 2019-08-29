<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Student;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
.header_signup {
  background-color: #85C1E9;
  margin:0px;
  padding: 20px;
  text-align: center;
}
.signup_form {
  border-radius: 5px;
  background-color: #f2f2f2;
  width: 40%;
  border: 1px solid #85C1E9;
}

.input_signup {
  padding: 20px;
  width: 80%;
}
</style>

<center>
<div class="signup_form">
    <h2 class="header_signup"><?= Html::encode($this->title) ?></h2>

    <div class="row input_signup" >
    <p>โปรดกรอก username เป็นรหัสนักศึกษา</p>
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</center>
