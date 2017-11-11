<?php
    use app\widgets\CategoryWidget;
    use app\widgets\CategoryFilterWidget;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\LinkPager;
?>
<div class="shoes-grid">
    <?= CategoryFilterWidget::widget() ?>
    <div class="product-left">
        <?php $i = 1; ?>
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 chain-grid <?php if ($i % 3 == 0) echo 'grid-top-chain' ?>">
                <a href="<?= Url::to(['product/view', 'id' => $product['id']]) ?>">
                    <!--img class="img-responsive chain" src="images/bott.jpg" alt=" " /-->
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
            <?php if ($i % 3 == 0): ?>
            <!--div style="height: 50px; width: 100%">dfdfdfd</div-->
            <?php endif; ?>
            <?php $i++; ?>
        <?php endforeach; ?>
        <div class="clearfix"> </div>
        <?= LinkPager::widget(['pagination' => $pages,]) ?>
    </div>
    <div class="clearfix"> </div>
</div>
<div class="sub-cate">
    <?= CategoryWidget::widget() ?>
</div>