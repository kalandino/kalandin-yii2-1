<?php

namespace app\controllers;

use app\models\Test;
use yii\web\Controller;

class TaskController extends Controller
{
  public function actionIndex()
  {
  	$model = new Test();

  	$model->setAttributes([
      'title' => 'test',
      'content' => 'Какая-то Абракадабра'
    ]);

		var_dump($model->validate());
		var_dump($model->getErrors());

    // return $this->render('index', [
    //   'title' => 'Yii2 Framework',
    //   'content' => 'Hello, Yii'
    // ]);
  }
}