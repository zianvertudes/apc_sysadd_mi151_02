<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Ticket_detailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ticketdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticketdetails-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ticketdetails', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ticket_det_id',
            'status',
            'time_start',
            'time_end',
            'desc:ntext',
            // 'emp_resp_id',
            // 'category_id',
            // 'ticket_id',
            // 'dept_resp_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
