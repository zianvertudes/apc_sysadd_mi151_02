<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\room1 */

$this->title = 'Create Room1';
$this->params['breadcrumbs'][] = ['label' => 'Room1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
