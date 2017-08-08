<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TicketDetails */

$this->title = 'Update Ticket Details: ' . $model->ticket_det_id;
$this->params['breadcrumbs'][] = ['label' => 'Ticket Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ticket_det_id, 'url' => ['view', 'ticket_det_id' => $model->ticket_det_id, 'emp_resp_id' => $model->emp_resp_id, 'category_id' => $model->category_id, 'ticket_id' => $model->ticket_id, 'dept_resp_id' => $model->dept_resp_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ticket-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
