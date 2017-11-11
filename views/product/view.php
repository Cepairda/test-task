<?php
    use app\widgets\CategoryWidget;
    use yii\helpers\Html;
    use yii\helpers\Url;
?>

<div class=" single_top">
    <?php if (!empty($product)): ?>
    <div class="single_grid">
        <div class="grid images_3_of_2">
            <ul id="etalage">
                <li>
                    <?= Html::img('@web/images/products/' . $product['img'], ['class' => 'img-responsive'])?>
                </li>
            </ul>
            <div class="clearfix"> </div>
        </div>
        <div class="desc1 span_3_of_2">
            <h4><?= $product['name'] ?></h4>
            <div class="cart-b">
                <div class="left-n ">$<?= $product['price'] ?></div>
                <a class="now-get get-cart-in" href="#">Купить</a>
                <div class="clearfix"></div>
            </div>
            <h6>
                <?php $i = 1; $countCategories = count($categories); ?>
                <?php foreach($categories as $category): ?>
                    <a href="<?= Url::to(['category/view', 'id' => $category['id']]) ?>"><?= $category['name'] ?></a>
                    <?php if ($i < $countCategories): ?>
                        ,
                    <?php endif; ?>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </h6>
            <h6>
                Производитель: <?= $provider['name'] ?>
            </h6>
            <p>
                Фильм (англ. film — плёнка), а также — кино, кинофильм, телефильм,
                кинокартина — отдельное произведение киноискусства.
                В технологическом плане фильм представляет собой совокупность движущихся изображений (монтажных кадров),
                связанных единым сюжетом[1].
                Каждый монтажный кадр состоит из последовательности фотографических
                или цифровых неподвижных изображений (кадриков),
                на которых зафиксированы отдельные фазы движения.
                Фильм, как правило, включает в себя звуковое сопровождение.
            </p>
        </div>
        <div class="clearfix"> </div>
    </div>
    <?php else: ?>
        <div class="products">
            <h5 class="latest-product"><?= 'Товар не существует.' ?></h5>
        </div>
    <?php endif; ?>
</div>

<div class="sub-cate">
    <?= CategoryWidget::widget() ?>
</div>