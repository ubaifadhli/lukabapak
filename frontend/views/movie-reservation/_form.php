<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MovieReservation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movie-reservation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'movie_schedule_id')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
