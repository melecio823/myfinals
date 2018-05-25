<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sold_items".
 *
 * @property int $id
 * @property int $motorcycles_id
 * @property int $sales_id
 * @property int $quantity
 * @property string $amount
 *
 * @property Motorcycles $Motorcycles
 * @property Sales $sales
 */
class SoldItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sold_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['motorcycle_id', 'sales_id', 'quantity', 'amount'], 'required'],
            [['motorcycle_id', 'sales_id', 'quantity'], 'integer'],
            [['amount'], 'number'],
            [['motorcycle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Motorcycles::className(), 'targetAttribute' => ['motorcycle_id' => 'id']],
            [['sales_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sales::className(), 'targetAttribute' => ['sales_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'motorcycle_id' => 'Motorcycle ID',
            'sales_id' => 'Sales ID',
            'quantity' => 'Quantity',
            'amount' => 'Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMotorcycle()
    {
        return $this->hasOne(Motorcycles::className(), ['id' => 'motorcycle_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasOne(Sales::className(), ['id' => 'sales_id']);
    }
}
