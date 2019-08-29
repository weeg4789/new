<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Program;
use common\models\Department;
use common\models\Semester;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($user, 'username')->textInput() ?>

    <?= $form->field($user, 'password_hash')->textInput() ?>
    
    <?= $form->field($user, 'email')->textInput() ?>

    <?= $form->field($model, 'std_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'semester_id')->dropDownList(ArrayHelper::map(Semester::find()->all(),'id','semester')) ?>

    <?= $form->field($model, 'department_id')->dropDownList(Department::getDep(),
    ['prompt' => 'Select...','id' => 'dep-id']) ?>

    <?= $form->field($model, 'program_id')->widget(DepDrop::classname(), [
    'options'=>['prompt' => 'Select...'],
    'pluginOptions'=>[
        'depends'=>['dep-id'],
        'placeholder'=>'Select...',
        'url'=>Url::to(['common/program'])
     ]
    ]);?>

    <?= $form->field($model, 'company_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
