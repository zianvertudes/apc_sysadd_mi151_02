<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Room1Class */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Room1s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room1-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Room1', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'room_type',
            'room_loc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
