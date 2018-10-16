<?php

namespace app\controllers;

// use app\models\tables\Users;
use app\models\tables\Tasks;
// use app\models\Test;
use yii\web\Controller;

class TaskController extends Controller
{
  public function actionIndex()
  {
    // $model = new Test();

    // $model->setAttributes([
    //   'title' => 'Yii2',
    //   'content' => 'Какая-то Абракадабра'
    // ]);


    // if (!$model->validate()) {
    //   var_dump($model->validate());
    //   var_dump($model->getErrors());
    //   exit;
    // }

    // return $this->render('index', [
    //   'title' => $model->title,
    //   'content' => $model->content
    // ]);

    $tasks = Tasks::find()
              ->where(['>=', 'created', '2018-10-01'])
              ->andWhere(['<', 'created', '2018-11-01'])
              ->all();

    return $this->render('index', [
      'tasks' => $tasks
    ]);
  }

  public function actionTest()
  {
    var_dump('Тест');
  }
}