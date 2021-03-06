<?php

namespace backend\modules\studented\controllers;

use Yii;
use common\models\Student;
use backend\modules\studented\models\StudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\User;
use common\components\UserRule;

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
            
            'access' => [
                'class' => AccessControl::className(),
                // We will override the default rule config with the new AccessRule class
                'ruleConfig' => [
                    'class' => UserRule::className(),
                ],
                'only' => ['index','create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        // Allow users,  and admins to create
                        'roles' => [
                            User::ROLE_USER,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['update','create'],
                        'allow' => true,
                        // Allow  and admins to update
                        'roles' => [
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        // Allow admins to delete
                        'roles' => [
                            User::ROLE_ADMIN
                        ],
                    ],
                ],
            ],    
        ];
    }


    public function actionProgram() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $dep_id = $parents[0];
                $out = Program::getProgramlist($dep_id); 
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                return Json::encode(['output'=>$out, 'selected'=>'']);
            }
        }
        return Json::encode(['output'=>$out, 'selected'=>'']);
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

    /**
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Student();
        $user = new User();

        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            $user->password_hash=Yii::$app->security->generatePasswordHash($user->password_hash);
            $user->auth_key=Yii::$app->security->generateRandomString();
            if($user->save()){
                $model->user_id = $user->id;
                $model->save();
            }
            //var_dump($user);
            //var_dump($model);
            
            return $this->redirect(['view', 'user_id' => $model->user_id, 'semester_id' => $model->semester_id]);
        }else{

        return $this->render('create', [
            'model' => $model,
            'user' => $user,
        ]);
        }
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
        $user = $model->user;
         $oldPass = $user->password_hash;

        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {

            if($oldPass!=$user->password_hash){//เปลี่ยนรหัสผ่าน
                $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);
            }

            if($user->save()){
               $model->save(); 
            }
             
            return $this->redirect(['view', 'user_id' => $model->user_id, 'semester_id' => $model->semester_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'user' => $user,
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
}

