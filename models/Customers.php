<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $email
 *
 * @property SoldCars[] $soldCars
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'email','phone','gender'], 'required'],
            [['name', 'email'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 300],
            [['phone'], 'string', 'max' => 300],
            [['gender'], 'string', 'max' => 300],
            [['email'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'gender' => 'Gender',
            'phone'  => 'Phone ',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoldCars()
    {
        return $this->hasMany(SoldCars::className(), ['customer_id' => 'id']);
    }
}
