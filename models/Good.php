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

    public function getOrderGoods()
    {
        return $this->hasMany(OrderGood::class, ['id_good' => 'id']);
    }

    public static function getAllGood()
    {
        return self::find()->all();
    }

    public static function findAllLike($name)
    {
        return self::find()->filterWhere(['like', 'name', $name])->all();
    }

    public static function getByIdentity($id)
    {
        return self::find()->where(['id' => $id])->one();
    }
}
