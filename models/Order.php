<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property float $price
 * @property string $date
 * @property string $status
 * @property string $address
 *
 * @property OrderGood[] $orderGoods
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'status', 'address'], 'required'],
            [['price'], 'number'],
            [['date'], 'safe'],
            [['status'], 'string', 'max' => 16],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'date' => 'Date',
            'status' => 'Status',
            'address' => 'Address',
        ];
    }

    /**
     * Gets query for [[OrderGoods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderGoods()
    {
        return $this->hasMany(OrderGood::className(), ['id_order' => 'id']);
    }
}
