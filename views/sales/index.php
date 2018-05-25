<?php
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Motorcycles;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Point Of Sale";

?>
<h1><?= $this->title; ?></h1>

<div class="row">
    <div class="col-md-4">
        <h2>Add Motorcycle</h2>

        <?php $form = ActiveForm::begin(['action'=>Url::toRoute(['sales/add-item'])]); ?>

        <?= $form->field($itemForm, 'itemId')->textInput();?>

        <?= $form->field($itemForm, 'quantity')->textInput(); ?>

        <?= $form->field($itemForm, 'salesId')->hiddenInput()->label(null); ?>

        <div class="form-group">
            <?= Html::submitButton('Add Item', ['class'=>'btn btn-primary']); ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <div class="col-md-8">
        <h2>Motorcycles</h2>
        <table class="table table-striped">
            <tr>
                <th>Motorcycle ID</th>
                <th>Motorcycle Name</th>
                <th>Quantity Purchased</th>
                <th>Price</th>
                <th>Amount</th>
            </tr>
            <?php $subtotal = 0; ?>
            <?php foreach($sales->soldItems as $soldItem): ?>
                <?php $subtotal += $soldItem->amount; ?>
            <tr>
                <td><?= $soldItem->motorcycle_id ?></td>
                <td><?= $soldItem->motorcycle->motor_name ?></td>
                <td><?= $soldItem->quantity ?></td>
                <td align="right"><?= number_format($soldItem->motorcycle->price,2) ?></td>
                <td align="right"><?= number_format($soldItem->amount,2) ?></td>
            </tr>

            <?php endforeach; ?>
            <tr>
                <th colspan="4">Total Amount to be Paid</th>
                <td align="right"><strong><?= number_format($subtotal,2); ?></strong></td>
            </tr>
        </table>

        <?= Html::a('Finish', ['/sales/finish'],['class'=>'btn btn-success btn-lg pull-right']); ?>
    </div>
</div>