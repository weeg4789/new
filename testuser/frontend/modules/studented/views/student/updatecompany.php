<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\models\Company;

/* @var $this yii\web\View */
/* @var $model common\models\Student */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'แก้ไข : ' . ' ' . $model->firstname.' '.$model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'นักศึกษา', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->firstname.' '.$model->lastname, 'url' => ['profile', 'user_id' => $model->user_id, 'semester_id' => $model->semester_id]];
$this->params['breadcrumbs'][] = 'แก้ไขข้อมูลสถานสหกิจ';
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_id')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(Company::find()->all(),'id','namecompany'),
                  'language' => 'en',
                  'options' => ['placeholder' => 'ชื่อบริษัท ...'],
                  'pluginOptions' => [
                  'allowClear' => true
                      ],
                  ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
