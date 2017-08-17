<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ticket */

$this->title = 'Update Ticket: ' . $model->ticket_id;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ticket_id, 'url' => ['view', 'ticket_id' => $model->ticket_id, 'guest_id' => $model->guest_id, 'room_id' => $model->room_id, 'emp_create_id' => $model->emp_create_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ticket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
