<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MotorcyclesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Motorcycles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motorcycles-index">
   
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Motorcycles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'motor_name',
            'model',
            'description',
            'price',
            'quantity',
           
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
