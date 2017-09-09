<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Ticket */
/* @var $form yii\widgets\ActiveForm  */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time_start')->textInput() ?>

    <?= $form->field($model, 'time_end')->textInput() ?>

    <?= $form->field($model, 'time_alloted')->textInput() ?>

    <?= $form->field($model, 'escalation_level')->textInput() ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'check_in_id')->textInput() ?>

    <?= $form->field($model, 'emp_repond_id')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>
    

    <?= $form->field($model, 'emp_create_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
