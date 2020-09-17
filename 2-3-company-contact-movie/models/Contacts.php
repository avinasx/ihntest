<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property int $companyid
 * @property string $name
 * @property string $email
 * @property int $phone
 * @property string $designation
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['companyid', 'name', 'email', 'phone', 'designation'], 'required'],
            [['companyid', 'phone'], 'integer'],
            ['phone', 'number', 'max' => 9999999999, 'min' => 1000000000, 'tooBig' => 'Please enter a valid Phone number.', 'tooSmall' => 'Please enter a valid Phone number.'],
            [['email'], 'email'],
            [['name', 'email', 'designation'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'companyid' => Yii::t('app', 'Company Id'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'designation' => Yii::t('app', 'Designation'),
        ];
    }

}


