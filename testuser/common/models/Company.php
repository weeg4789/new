<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $namecompany
 * @property string $address
 * @property int $phone
 *
 * @property Student[] $students
 * @property TeacheManage[] $teacheManages
 * @property Teacher[] $teachers
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['namecompany', 'address'], 'required'],
            [['address'], 'string'],
            [['phone'], 'integer'],
            [['namecompany'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'namecompany' => 'ชื่อบริษัท',
            'address' => 'ที่อยู่บริษัท',
            'phone' => 'เบอร์ติดต่อ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacheManages()
    {
        return $this->hasMany(TeacheManage::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teacher::className(), ['user_id' => 'teacher_id'])->viaTable('teache_manage', ['company_id' => 'id']);
    }
}
