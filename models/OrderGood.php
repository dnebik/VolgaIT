<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_good".
 *
 * @property int $id
 * @property int $id_order
 * @property int $id_good
 * @property string $name
 * @property float price
 * @property int quantity
 * @property float sum
 *
 * @property Good $good
 * @property Order $order
 */
class OrderGood extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'order_good';
    }

    public function getGood()
    {
        return $this->hasOne(Good::class, ['id' => 'id_good']);
    }

    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'id_order']);
    }

    public static function saveOrderInfo(array $goods,int $orderId) {
        foreach ($goods as $id => $item) {
            $orderInfo = new OrderGood();
            $orderInfo->id_order = $orderId;
            $orderInfo->id_good = $id;
            $orderInfo->name = $item['name'];
            $orderInfo->price = $item['price'];
            $orderInfo->quantity = $item['count'];
            $orderInfo->sum = $item['count'] * $item['price'];
            $orderInfo->save();
        }
    }
}
