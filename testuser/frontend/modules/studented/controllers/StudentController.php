<?php

namespace frontend\modules\studented\controllers;

use Yii;
use common\models\Student;
use frontend\modules\studented\models\StudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
     * @param integer $user_id
     * @param integer $semester_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($user_id, $semester_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($user_id, $semester_id),
        ]);
    }

    public function actionProfile($user_id, $semester_id)
    {
        return $this->render('profile', [
            'model' => $this->findModel($user_id, $semester_id),
        ]);
    }

    /**
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Student();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'semester_id' => $model->semester_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $user_id
     * @param integer $semester_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($user_id, $semester_id)
    {
        $model = $this->findModel($user_id, $semester_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'semester_id' => $model->semester_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Student model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $user_id
     * @param integer $semester_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($user_id, $semester_id)
    {
        $this->findModel($user_id, $semester_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $user_id
     * @param integer $semester_id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id, $semester_id)
    {
        if (($model = Student::findOne(['user_id' => $user_id, 'semester_id' => $semester_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionResetpassword($user_id, $semester_id)
    {
        $model = $this->findModel($user_id, $semester_id);
        $user = $model->user;
        $oldPass = $user->password_hash;

        if ($user->load(Yii::$app->request->post())) {

            if($oldPass!=$user->password_hash){//เปลี่ยนรหัสผ่าน
                $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);
            }
            $user->save();
               
            return $this->redirect(['profile', 'user_id' => $model->user_id, 'semester_id' => $model->semester_id]);
        }

        return $this->render('resetpassword', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    public function actionUpdatecompany($user_id, $semester_id)
    {
        $model = $this->findModel($user_id, $semester_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['profile', 'user_id' => $model->user_id, 'semester_id' => $model->semester_id]);
        }

        return $this->render('updatecompany', [
            'model' => $model,
        ]);
    }
}
