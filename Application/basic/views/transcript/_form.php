<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Transcript */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transcript-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ticket_id')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'by_employee')->textInput() ?>

    <?= $form->field($model, 'current_emp_resp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
