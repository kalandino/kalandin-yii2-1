<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registration';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="site-registration">

		    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'login')->textInput() ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

		    <div class="form-group">
		        <?= Html::submitButton('Registration', ['class' => 'btn btn-success']) ?>
		    </div>

		    <?php ActiveForm::end(); ?>

		</div>


</div>
