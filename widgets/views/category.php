<?php
    use yii\helpers\Url;
?>
<div class=" top-nav rsidebar span_1_of_left">
    <h3 class="cate">Жанры</h3>
    <ul class="menu">
        <?php foreach ($categories as $category): ?>
            <li class="item1">
                <a href="<?= Url::to(['category/view', 'id' => $category['id']]) ?>"><?= $category['name'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>