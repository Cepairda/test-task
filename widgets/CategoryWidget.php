<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 05.11.2017
 * Time: 0:32
 */

namespace app\widgets;

use yii\base\Widget;
use app\models\Category;

class CategoryWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $categories = Category::find()->asArray()->all();

        return $this->render('category', [
            'categories' => $categories
        ]);
    }
}