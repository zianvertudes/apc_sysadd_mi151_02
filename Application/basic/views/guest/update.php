<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\guest */

$this->title = 'Update Guest: ' . $model->guest_id;
$this->params['breadcrumbs'][] = ['label' => 'Guests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->guest_id, 'url' => ['view', 'id' => $model->guest_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
