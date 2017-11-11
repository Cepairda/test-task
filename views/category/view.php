<?php
    use app\widgets\CategoryWidget;
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use app\widgets\CategoryFilterWidget;
    use yii\helpers\Url;
?>
<div class="shoes-grid">
    <?= CategoryFilterWidget::widget() ?>
    <?php if (!empty($products)): ?>
        <div class="products">
            <h5 class="latest-product">Просмотр категории - <?= $category['name'] ?></h5>
        </div>
        <div class="product-left">

            <?php $i = 1; ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 chain-grid <?php if ($i % 3 == 0) echo 'grid-top-chain' ?>">
                    <a href="<?= Url::to(['product/view', 'id' => $product['id']]) ?>">
                        <?= Html::img('@web/images/products/' . $product['img'], [
                                'class' => 'img-product chain',
                                'height' => '365'
                            ])
                        ?>
                    </a>
                    <span class="star"> </span>
                    <div class="grid-chain-bottom">
                        <h6><a href="<?= Url::to(['product/view', 'id' => $product['id']]) ?>"><?= $product['name'] ?></a></h6>
                        <div class="star-price">
                            <div class="dolor-grid">
                                <span class="actual"><?= $product['price'] ?>$</span>
                            </div>
                            <a class="now-get get-cart" href="<?= Url::to(['product/view', 'id' => $product['id']]) ?>">Подробней</a>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
            <div class="clearfix"> </div>
            <?= LinkPager::widget(['pagination' => $pages,]) ?>
        </div>
    <?php else: ?>
        <div class="products">
            <h5 class="latest-product"><?= 'Данной категории не существует.' ?></h5>
        </div>
    <?php endif; ?>
    <div class="clearfix"> </div>
</div>
<div class="sub-cate">
    <?= CategoryWidget::widget() ?>
</div>