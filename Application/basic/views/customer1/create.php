<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\customer1 */

$this->title = 'Create Customer1';
$this->params['breadcrumbs'][] = ['label' => 'Customer1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>