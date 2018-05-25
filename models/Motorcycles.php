<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "motorcycles".
 *
 * @property int $id
 * @property string $motor_name
 * @property string $model
 * @property string $description
 * @property string $price
 * @property int $quantity
 *
 * @property SoldItems[] $soldItems
 */
class Motorcycles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'motorcycles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['motor_name', 'model', 'price', 'quantity'], 'required'],
            [['price'], 'number'],
            [['quantity'], 'integer'],
            [['motor_name', 'model'], 'string', 'max' => 191],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'motor_name' => 'Motor Name',
            'model' => 'Model',
            'description' => 'Description',
            'price' => 'Price',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoldItems()
    {
        return $this->hasMany(SoldItems::className(), ['motorcycle_id' => 'id']);
    }
}
