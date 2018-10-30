<?php

use yii\helpers\Html;

if (\Yii::$app->language == 'ru') {
    echo Html::a('en', array_merge(
        \Yii::$app->request->get(),
        [\Yii::$app->controller->route, 'language' => 'en']
    ));
} else {
    echo Html::a('ru', array_merge(
        \Yii::$app->request->get(),
        [\Yii::$app->controller->route, 'language' => 'ru']
    ));
}