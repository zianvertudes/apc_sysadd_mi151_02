<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TicketDetails */

$this->title = $model->ticket_det_id;
$this->params['breadcrumbs'][] = ['label' => 'Ticket Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ticket_det_id' => $model->ticket_det_id, 'emp_resp_id' => $model->emp_resp_id, 'category_id' => $model->category_id, 'ticket_id' => $model->ticket_id, 'dept_resp_id' => $model->dept_resp_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ticket_det_id' => $model->ticket_det_id, 'emp_resp_id' => $model->emp_resp_id, 'category_id' => $model->category_id, 'ticket_id' => $model->ticket_id, 'dept_resp_id' => $model->dept_resp_id], [
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
            'ticket_det_id',
            'status',
            'time_start',
            'time_end',
            'desc:ntext',
            'emp_resp_id',
            'category_id',
            'ticket_id',
            'dept_resp_id',
        ],
    ]) ?>

</div>
