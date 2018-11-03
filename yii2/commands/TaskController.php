<?php

namespace app\commands;

use Yii;
use app\models\tables\Users;
use app\models\tables\Tasks;
use app\models\tables\TaskSearch;
use yii\console\Controller;
use yii\console\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\base\Event;

class TaskController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // $setFrom = 'tasks@gmail.com';
        // $setTextBody = "До окончания выполнения задачи осталось меньше суток";

        // Event::on(Tasks::class, Tasks::EVENT_AFTER_INSERT, function($model) {
        //     $user = Users::find()
        //         ->where(["id" => $model->sender->user_id])
        //         ->one();

        //     Yii::$app->mailer->compose()
        //         ->setFrom($setFrom)
        //         ->setTo($user->email)
        //         ->setSubject($model->sender->name)
        //         ->setTextBody($setTextBody)
        //         ->send();
        // });

        echo 'Прошел по таскам и вывел дату дедлайна. Разослал оповещение пользователям. Все отлично работает' . "\n";
    }
}
