<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TicketDetails */

$this->title = 'Create Ticket Details';
$this->params['breadcrumbs'][] = ['label' => 'Ticket Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
