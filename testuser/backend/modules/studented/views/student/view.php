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
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-users"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

    <p>
        <?= Html::a('Print', ['print', 'user_id' => $model->user_id, 'semester_id' => $model->semester_id], ['class' => 'btn btn-success']) ?>  
        <?= Html::a('Update', ['update', 'user_id' => $model->user_id, 'semester_id' => $model->semester_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'user_id' => $model->user_id, 'semester_id' => $model->semester_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user.username',
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
</div>
