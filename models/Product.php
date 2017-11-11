<?php

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])
            ->viaTable('category_product', ['product_id' => 'id']);
    }

    public function getCategoriesId()
    {
        return $this->hasMany(CategoryProduct::className(), ['product_id' => 'id']);
    }

    public function getProvider()
    {
        return $this->hasOne(Provider::className(), ['id' => 'provider_id']);
    }

    public function rules()
    {
        return [
            //[['provider_id', 'name', 'price', 'img'], 'required'],
            [['provider_id', 'price'], 'integer'],
            [['name', 'img'], 'string']
        ];
    }
}