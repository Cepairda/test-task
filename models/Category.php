<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    protected $_categories = [];

    public static function tableName()
    {
        return 'category';
    }

    public function setCategories($categories)
    {
        $this->_categories = $categories;
    }

    public function getCategories()
    {
        return $this->_categories;
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])
            ->viaTable('category_product', ['category_id' => 'id']);
    }
}