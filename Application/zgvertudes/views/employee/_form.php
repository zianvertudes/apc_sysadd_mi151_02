<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'emp_id')->textInput() ?>

    <?= $form->field($model, 'dept_id')->textInput() ?>

    <?= $form->field($model, 'dept_id')->dropDownList(
    	ArrayHelper::map(Department::find()->all(), 'dept_id', 'dept_name'),['prompt'=>'Select Dapartment']
    ) ?>

    <?= $form->field($model, 'emp_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
