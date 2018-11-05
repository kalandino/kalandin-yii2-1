<?php

namespace app\commands;

use Yii;
use app\models\tables\Users;
use app\models\tables\Tasks;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $date = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        $setFrom = 'tasks@gmail.com';
        $setTextBody = "До окончания выполнения задачи осталось меньше суток";

        $tasks = Tasks::find()->with('users')->where(['<', 'deadline', $date])->all();
        foreach ($tasks as $task) {
            Yii::$app->mailer->compose()
                ->setFrom($setFrom)
                ->setTo($tasks->email)
                ->setTextBody($setTextBody)
                ->send();

            echo 'Сообщение отправлено' . "\n";
        }
    }
}
