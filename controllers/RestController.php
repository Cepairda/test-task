<?php

namespace app\controllers;


class RestController extends AppController
{
    public function actionView()
    {
        $this->view->title = 'REST API';

        return $this->render('view');
    }
}