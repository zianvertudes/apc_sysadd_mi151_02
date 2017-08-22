<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ticketdetails */

$this->title = 'Create Ticketdetails';
$this->params['breadcrumbs'][] = ['label' => 'Ticketdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticketdetails-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
