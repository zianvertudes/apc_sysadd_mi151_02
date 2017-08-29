<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\room1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'room_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'room_loc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
