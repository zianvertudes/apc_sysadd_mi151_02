<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ticket */

$this->title = $model->ticket_id;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ticket_id' => $model->ticket_id, 'guest_id' => $model->guest_id, 'room_id' => $model->room_id, 'emp_create_id' => $model->emp_create_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ticket_id' => $model->ticket_id, 'guest_id' => $model->guest_id, 'room_id' => $model->room_id, 'emp_create_id' => $model->emp_create_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ticket_id',
            'guest_id',
            'room_id',
            'emp_create_id',
            'date_created',
        ],
    ]) ?>

</div>
