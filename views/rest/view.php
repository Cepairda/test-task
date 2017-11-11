<?php
use app\widgets\CategoryWidget;
use yii\helpers\Url;

$this->registerJsFile('@web/js/rest.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>

<div class=" single_top">

    <div class="rest">
        <a class="btn btn-primary btn-lg btn-block" id="one-product" href="<?= Url::to('@web/api/products/1', true) ?>">Получить первый товар</a>
        <a class="btn btn-primary btn-lg btn-block"id="preparation-for-edit" href="<?= Url::to('@web/api/products/1', true) ?>"  >Изменить первый товар</a>
        <a class="btn btn-primary btn-lg btn-block" id="all-product" href="<?= Url::to('@web/api/products', true) ?>">Получить все товары товары</a>
    </div>
    <div id="message" class="rest"></div>
    <form class="hidden" id="rest-edit-form-preparation" action="<?= Url::to('@web/api/products/1', true) ?>">
        <!--div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" value=""/>
        </div-->
        <div class="form-group">
            <label for="provider-id">Provider ID</label>
            <input type="text" class="form-control" id="provider-id" name="provider-id" value=""/>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name-product" value=""/>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" value=""/>
        </div>
        <div class="form-group">
            <label for="img">Image</label>
            <input type="text" class="form-control" id="img" name="img" value=""/>
        </div>
        <button class="btn btn-primary" id="one-product-edit-preparation">Изменить</button>
    </form>

</div>

<div class="sub-cate">
    <?= CategoryWidget::widget() ?>
</div>