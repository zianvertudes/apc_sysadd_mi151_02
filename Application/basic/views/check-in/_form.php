<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\CheckIn;
use app\models\Customer1;


/* @var $this yii\web\View */
/* @var $model app\models\CheckIn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="check-in-form">

    <?php $form = ActiveForm::begin(); ?>


	<?= $form->field($model, 'customer_id')->dropDownList(
		ArrayHelper::map (Customer1::find()->all(), 'id', 'customer_name'),
		['prompt'=>'Select Customer ID']
		) ?>

    <?= $form->field($model, 'room_id')->textInput() ?>

    <?= $form->field($model, 'check_in')->textInput() ?>

    <?= $form->field($model, 'check_out')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
