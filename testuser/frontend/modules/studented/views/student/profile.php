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
.profile-container {
  border-radius: 5px;
  background-color: #f2f2f2;
  width: 100%;
  border: 1px solid #85C1E9;
}

.header_profile {
  background-color: #85C1E9;
  margin:0px;
  padding: 20px;
  color: #FFFFFF;
}

.body_profile {
  width: 100%;
  padding: 20px;
}

</style>

<div class="profile-container ">

    <h2 class="header_profile"><?= Html::encode($this->title) ?></h2>
<div class="body_profile">
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
</div>
