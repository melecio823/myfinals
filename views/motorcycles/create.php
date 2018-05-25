<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\motorcycles */

$this->title = 'Create Motorcycles';
$this->params['breadcrumbs'][] = ['label' => 'Motorcycles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motorcycles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
