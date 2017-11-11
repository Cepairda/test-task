<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 06.11.2017
 * Time: 0:50
 */

namespace app\widgets;

use yii\base\Widget;
use app\models\Category;
use Yii;

class CategoryFilterWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $model = new Category();
        $categories = Category::find()->asArray()->all();

        $selection = Yii::$app->request->get('categories') ?? Yii::$app->request->get('id');;
        //$selection = //$wh//Yii::$app->request->get('categories');//$_GET['categories'];

        //print_r($categories);

        return $this->render('categoryFilter', [
            'model' => $model,
            'categories' => $categories,
            'selection' => $selection
        ]);
    }
}