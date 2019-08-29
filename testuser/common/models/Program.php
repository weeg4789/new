<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "program".
 *
 * @property int $id
 * @property string $name ชื่อโปรแกรมวิชา
 * @property int $department_id สาขาวิชา
 *
 * @property Department $department
 * @property Student[] $students
 * @property Teacher[] $teachers
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'program';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'department_id'], 'required'],
            [['department_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อโปรแกรมวิชา',
            'department_id' => 'สาขาวิชา',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['program_id' => 'id', 'department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teacher::className(), ['program_id' => 'id', 'department_id' => 'department_id']);
    }

    public static function getProgramlist($dep_id)
    {
        $programs = self::find()
        ->select(['id','name'])
        ->where(['department_id' => $dep_id])
        ->asArray()
        ->all();
        return $programs;
    }
}
