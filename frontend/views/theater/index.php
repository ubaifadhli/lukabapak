<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TheaterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Theaters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="theater-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Theater', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'address',
            'telephone_number',
            'city_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
