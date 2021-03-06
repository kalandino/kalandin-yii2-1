<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\assets\CalendarAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tables\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

CalendarAsset::register($this);

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => 'view',
            'viewParams' => [
               'hideBreadcrumbs' => true
            ]
    ]); ?>
</div>
