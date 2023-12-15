<?php

namespace app\controllers;

use app\models\Cars;

class AutosController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCatalog()
    {
        $cars = Cars::find()->innerJoin('manufacturer', 'manufacturer.id = cars.manufacturerID')->asArray()->all();

        return $this->render('catalog', compact('cars'));
    }

    public function actionContact()
    {
        return $this->render('contact');
    }
}