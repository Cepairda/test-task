<?php

namespace app\controllers;

use app\models\Product;
use yii\data\Pagination;
use Yii;
use yii\web\HttpException;

class ProductController extends AppController
{
    public function actionAll()
    {
        $query = Product::find();

        $pages= new Pagination([
            'defaultPageSize' => 12,
            'totalCount' => $query->count(),
            'forcePageParam' => false,
        ]);

        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $this->view->title = 'Главная страница';

        return $this->render('index', [
            'products' => $products,
            'pages' => $pages
        ]);
    }

    public function actionView()
    {
        $id = Yii::$app->request->get('id');

        if (empty($id)) {
            throw new HttpException(404 ,'Страница не существует');
        }

        $product = Product::find()->where(['id' => $id])
            ->with(['categories', 'provider'])
            ->asArray()
            ->one();

        $categories = $product['categories'];
        $provider = $product['provider'];

        unset($product['categories']);
        unset($product['provider']);

        $this->view->title = 'Просмотр продукта - ' . $product['name'];

        return $this->render('view', [
            'product' => $product,
            'categories' => $categories,
            'provider' => $provider
        ]);
    }

    public function actionSearch()
    {
        $name = Yii::$app->request->get('name');

        $query = Product::find()->where(['like', 'name', $name]);

        $pages= new Pagination([
            'defaultPageSize' => 12,
            'totalCount' => $query->count(),
            'forcePageParam' => false,
        ]);

        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $this->view->title = 'Поиск продукта ' . $name;

        return $this->render('search', [
            'name' => $name,
            'products' => $products,
            'pages' => $pages
        ]);
    }
}