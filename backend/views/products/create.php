<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = 'Create Products';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dropdownData'=>$dropdownData,
        'statusList' => $statusList,

    ]) ?>
    <!--//    --><?php //$form = ActiveForm::begin(); ?>
    <!---->
    <!--    --><? //= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <!---->
    <!--      випадаючий список-->-->
    <!--    --><? //= $form->field($model, 'selected_categories')->dropDownList($dropdownData,['multiple'=>'multiple'] ) ?>
    <!--        /випадаючий список-->-->
    <!---->
    <!--    --><? //= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
    <!---->
    <!--    --><? //= $form->field($model, 'price')->textInput() ?>
    <!---->
    <!--    --><? //= $form->field($model, 'image_id')->textInput() ?>
    <!---->
    <!--    --><? //= $form->field($model, 'status')->dropDownList($statusList) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <!--    --><?php //ActiveForm::end(); ?>
    ])?>
    <!--    ?>-->

</div>
