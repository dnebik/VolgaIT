<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_good".
 *
 * @property int $id
 * @property int $id_order
 * @property int $id_good
 *
 * @property Good $good
 * @property Order $order
 */
class OrderGood extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_good';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order', 'id_good'], 'required'],
            [['id_order', 'id_good'], 'integer'],
            [['id_good'], 'exist', 'skipOnError' => true, 'targetClass' => Good::className(), 'targetAttribute' => ['id_good' => 'id']],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['id_order' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_order' => 'Id Order',
            'id_good' => 'Id Good',
        ];
    }

    /**
     * Gets query for [[Good]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGood()
    {
        return $this->hasOne(Good::className(), ['id' => 'id_good']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'id_order']);
    }
}
