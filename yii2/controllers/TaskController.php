<?php

namespace app\controllers;

use Yii;
use app\models\tables\Tasks;
use app\models\tables\Users;
use app\models\tables\TaskSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\base\Event;

/**
 * TaskController implements the CRUD actions for Tasks model.
 */
class TaskController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * Lists all Tasks models.
     * @return mixed
     */
    public function actionIndex()
    {
        // \Yii::$app->language = "en";
        // echo \Yii::t("app", "error", ['error_code' => 404]);
        // exit;

        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tasks model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $cache = \Yii::$app->cache;
        $key = 'task_' . $id;

        if ($cache->exists($key)) {
            $model = $cache->get($key);
        } else {
            $model = $this->findModel($id);
            $cache->set($key, $model, 3600);
        }

        $users = ArrayHelper::map(Users::find()->all(), 'id', 'login');

        return $this->render('view', [
            'model' => $model,
            'users' => $users,
        ]);
    }

    /**
     * Creates a new Tasks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tasks();

        // $setFrom = 'tasks@gmail.com';
        // $setTextBody = "У вас новая задача";

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->end == NULL || $model->end < $model->date) {
                $model->end = $model->date;
            }

            if ($model->image = UploadedFile::getInstance($model, 'image')) {
                $model->upload();
            } else {
                $model->save();
            }
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $users = ArrayHelper::map(Users::find()->all(), 'id', 'login');

        return $this->render('create', [
            'model' => $model,
            'users' => $users,
        ]);
    }

    /**
     * Updates an existing Tasks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $users = ArrayHelper::map(Users::find()->all(), 'id', 'login');

        return $this->render('update', [
            'model' => $model,
            'users' => $users,
        ]);
    }

    /**
     * Deletes an existing Tasks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tasks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tasks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Detail an existing Tasks model.
     * If detail is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDetail($id)
    {
        $model = $this->findModel($id);

        $users = ArrayHelper::map(Users::find()->all(), 'id', 'login');

        return $this->render('detail', [
            'model' => $model,
            'users' => $users,
        ]);
    }
}
