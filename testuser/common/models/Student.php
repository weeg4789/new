<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $user_id
 * @property string $std_code รหัสนักศึกษา
 * @property string $firstname ชื่อ
 * @property string $lastname นามสกุล
 * @property int $phone เบอร์โทรศัพ
 * @property int $semester_id ปีการศึกษา
 * @property int $program_id โปรแกรมวิชา
 * @property int $department_id สาขาวิชา
 * @property int $company_id บริษัท
 *
 * @property Company $company
 * @property Program $program
 * @property Semester $semester
 * @property User $user
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'std_code', 'firstname', 'lastname', 'semester_id', 'program_id', 'department_id', 'company_id'], 'required'],
            [['user_id', 'phone', 'semester_id', 'program_id', 'department_id', 'company_id'], 'integer'],
            [['std_code'], 'string', 'max' => 13],
            [['firstname', 'lastname'], 'string', 'max' => 100],
            [['user_id', 'semester_id'], 'unique', 'targetAttribute' => ['user_id', 'semester_id']],
            //[['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            //[['program_id', 'department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['program_id' => 'id', 'department_id' => 'department_id']],
            //[['semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => Semester::className(), 'targetAttribute' => ['semester_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'std_code' => 'รหัสนักศึกษา',
            'firstname' => 'ชื่อ',
            'lastname' => 'นามสกุล',
            'phone' => 'เบอร์โทรศัพ',
            'semester_id' => 'ปีการศึกษา',
            'program_id' => 'โปรแกรมวิชา',
            'department_id' => 'สาขาวิชา',
            'company_id' => 'บริษัท',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['id' => 'program_id', 'department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSemester()
    {
        return $this->hasOne(Semester::className(), ['id' => 'semester_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
