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

<style>
.view-container {
  border-radius: 5px;
  background-color: #f2f2f2;
  width: 100%;
  border: 1px solid #85C1E9;
}

.header_view {
  background-color: #85C1E9;
  margin:0px;
  padding: 20px;
  color: #FFFFFF;
}

.body_view {
  width: 100%;
  padding: 20px;
}

</style>
<div class="view-container">

<h2 class="header_view"><?= Html::encode($this->title) ?></h2>
<div class="body_view">

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
</div>
