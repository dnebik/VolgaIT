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

    public static function tableName()
    {
        return 'order';
    }

    public function rules()
    {
        return [
            [['address', 'status'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'status' => 'Статус',
            'address' => 'Адрес',
            'sum' => 'Цена',
        ];
    }

    public function getOrderGoods()
    {
        return $this->hasMany(OrderGood::class, ['id_order' => 'id']);
    }

}
