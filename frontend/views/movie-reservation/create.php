<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\MovieReservation */

$this->title = 'Create Movie Reservation';
$this->params['breadcrumbs'][] = ['label' => 'Movie Reservations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movie-reservation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
