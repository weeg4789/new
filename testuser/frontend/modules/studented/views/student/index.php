<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Department;
use common\models\Company;
use common\models\Program;
use common\models\Student;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\studented\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลนักศึกษา';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-info box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-users"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          

            //'user_id',
            [
                'label' => 'รหัสนักศึกษา',
                'format' => 'raw',
                'value' => function ($user) {
                              return Html::a($user->std_code, ['/studented/student/view', 'user_id' => $user->user_id,
                              'semester_id'=>$user->semester_id ]);
                          },
         ],
           // 'std_code',
           //'firstname',
           //'lastname',
            [ // รวมคอลัมน์
                'label'=>'ชื่อ-นามสกุล',
                'format'=>'html',
                'value'=>function($model){
                  return $model->firstname.' '.$model->lastname;
                }
              ],
            //'phone',
            //'semester_id',
            //'program_id',
            //'program.department.name',
            [
                'attribute' => 'department_id',
                'value' => function($model){
                    return $model->program->name;
                },
                'filter' => Html::activeDropDownList($searchModel, 'program_id',
                 ArrayHelper::map(Program::find()->all(), 'id', 'name'),
                        ['class' => 'form-control']),
            ],

            [
                'attribute' => 'company_id',
                'value' => function($model){
                    return $model->company->namecompany;
                },
                'filter' => Html::activeDropDownList($searchModel, 'company_id',
                 ArrayHelper::map(Company::find()->all(), 'id', 'namecompany'),
                        ['class' => 'form-control']),
            ],

            [
                'label' => 'เอกสารส่งตัว',
                'format' => 'raw',
                'value' => function ($user) {
                              return Html::a('พิมพ์', ['/admin/region/view', 'id' => $user->std_code]);
                          },
         ],

         [
            'label' => 'เอกสารนิเทศ',
            'format' => 'raw',
            'value' => function ($user) {
                          return Html::a('พิมพ์', ['/admin/region/view', 'id' => $user->std_code]);
                      },
       ],

       [
        'label' => 'เอกสารขอบคุณ ',
        'format' => 'raw',
        'value' => function ($user) {
                      return Html::a('พิมพ์', ['/admin/region/view', 'id' => $user->std_code]);
                  },
       ],
           // 'company.namecompany',

           
           
            
           /* [
            'filter' =>   Html::a('PDF', ['pdf'], ['class' => 'btn btn-success']) 
            ], */

        ],
    ]); ?>

    

    


</div>
</div>

