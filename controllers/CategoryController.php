<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use yii\data\Pagination;
use Yii;
use yii\web\HttpException;

class CategoryController extends AppController
{
    public function actionView()
    {
        $id = (int) Yii::$app->request->get('id');

        if (empty($id)) {
            throw new HttpException(404 ,'Страница не существует');
        }

        $query = Category::find();//->asArray()->all();

        $pages= new Pagination([
            'defaultPageSize' => 12,
            'totalCount' => $query->count(),
        ]);

        $products = $query->where(['id' => $id])
            ->with('products')
            ->asArray()
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->one();

        $category = ['id' => $products['id'], 'name' => $products['name']];
        $products = $products['products'];

        $this->view->title = 'Просмотр категории - ' . $category['name'];

        return $this->render('view', [
            'category' => $category,
            'products' => $products,
            'pages' => $pages
        ]);
    }

    public function actionFilter()
    {
        $categories = Yii::$app->request->get('categories');

        $query = Product::find()->joinWith('categoriesId', false)
            ->where(['category_product.category_id' => $categories]);

        $queryCount = clone $query;
        $count = $queryCount->distinct('product.name')->count();

        $pages= new Pagination([
            'defaultPageSize' => 12,
            'totalCount' => $count,
        ]);

        $products = $query->asArray()
            ->distinct('product.id')
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $this->view->title = 'Фильтрация категорий';

        return $this->render('filter',[
            'categories' => $categories,
            'products' => $products,
            'pages' => $pages
        ]);
    }
}