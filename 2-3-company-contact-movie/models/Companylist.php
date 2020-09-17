<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "companylist".
 *
 * @property int $id
 * @property string $companyname
 * @property string $email
 * @property int $phone
 * @property string $address
 * @property string $city
 */
class Companylist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companylist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['companyname', 'email', 'phone', 'address', 'city'], 'required'],
            [['email'], 'email'],
            ['phone', 'number', 'max' => 9999999999, 'min' => 1000000000, 'tooBig' => 'Please enter a valid Phone number.', 'tooSmall' => 'Please enter a valid Phone number.'],
            [['companyname', 'address', 'city'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'companyname' => Yii::t('app', 'Company Name'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'address' => Yii::t('app', 'Address'),
            'city' => Yii::t('app', 'City'),
        ];
    }

    public static function getAll(){
        $result = [];
        $models = self::find()->all();
        if(!empty($models)){
            $result =  ArrayHelper::map($models, 'id','companyname');
        }
        return $result;
    }

    public static function resolve($id){
        $models = self::find()->all();
        if(!empty($models)){
           foreach ($models as $key => $val){
               if($val->id == $id){
                   return  $val->companyname;
               }
           }
        }
    }
}
