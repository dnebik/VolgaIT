<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "good".
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property string|null $description
 * @property string $link_name
 *
 * @property OrderGood[] $orderGoods
 */
class Good extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'good';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'link_name'], 'required'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 64],
            [['link_name'], 'string', 'max' => 255],
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
            'price' => 'Price',
            'description' => 'Description',
            'link_name' => 'Link Name',
        ];
    }

    /**
     * Gets query for [[OrderGoods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderGoods()
    {
        return $this->hasMany(OrderGood::className(), ['id_good' => 'id']);
    }

    public static function getAllGood()
    {
        return self::find()->all();
    }
    public static function findAllLike($name)
    {
        return self::find()->filterWhere(['like', 'name', $name])->all();
    }
}
