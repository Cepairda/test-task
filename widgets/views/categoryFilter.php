<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
    use yii\helpers\Url;
?>
<div class="products">
    <?php
        $form = ActiveForm::begin([
            'method' => 'get',
            'action' => ['category/filter'],
        ])
    ?>
    <?//= $form->field($model, 'categories')->checkboxList(ArrayHelper::map($categories, 'id', 'name'))?>
    <?= Html::checkboxList('categories', $selection, ArrayHelper::map($categories, 'id', 'name'))?>
    <div class="form-group">
        <?= Html::submitButton('Фильтровать', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Очистить', Url::to(['category/filter']) ,['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end() ?>
</div>