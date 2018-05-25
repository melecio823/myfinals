<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Motorcycles */

$this->title = 'Update Motorcycles ';
$this->params['breadcrumbs'][] = ['label' => 'Motorcycles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="motorcycles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
