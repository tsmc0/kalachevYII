<?php

namespace app\controllers;

use app\models\Animal;
use app\models\Country;

class CountryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $animals = Animal::find()->asArray()->all();
        $coun = Country::find()->asArray()->all();

        return $this->render('index', compact('animals', 'coun'));
    }
}