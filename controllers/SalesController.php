<?php

namespace app\controllers;

use yii;
use app\models\SoldItemForm;
use app\models\Sales;
use app\models\SoldItems;
use app\models\Motorcycles;

class SalesController extends \yii\web\Controller
{
    public function actionAddItem()
    {
        $itemForm = new SoldItemForm;

        if($itemForm->load(Yii::$app->request->post()) && $itemForm->validate()){
            
            $motorcycle = Motorcycles::findOne($itemForm->itemId);

            $soldItem = new SoldItems();
            $soldItem->sales_id = $itemForm->salesId;
            $soldItem->motorcycle_id = $itemForm->itemId;
            $soldItem->quantity = $itemForm->quantity;
            $soldItem->amount = $itemForm->quantity * $motorcycle->price;

            $soldItem->save();

            $motorcycle->quantity -= $soldItem->quantity;
            $motorcycle->save();
        }

        return $this->redirect(['/sales/index']);
    }

    public function actionFinish()
    {
        $sales = new Sales();
        $sales->save();

        return $this->redirect(['/sales/index']);
    }

    public function actionIndex()
    {
        $sales = Sales::getLatest();
        $itemForm = new SoldItemForm;
        $itemForm->salesId = $sales->id;

        return $this->render('index', compact('itemForm','sales'));
    }

}