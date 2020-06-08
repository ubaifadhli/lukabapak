<?php

namespace frontend\controllers;

use Yii;
use frontend\models\MovieReservation;
use frontend\models\MovieReservationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MovieReservationController implements the CRUD actions for MovieReservation model.
 */
class MovieReservationController extends Controller
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
     * Lists all MovieReservation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MovieReservationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MovieReservation model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MovieReservation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MovieReservation();

        $schedule_id = Yii::$app->request->get('schedule_id');

        // $scheduleData = (new \yii\db\Query())
        //         ->select('movie_schedule.id, movie_schedule.movie_id, movie_schedule.theater_id, movie_schedule.date, theater.name')
        //         ->from('movie_schedule, theater')
        //         ->where(['movie_schedule.id' => $schedule_id])
        //         // ->innerJoin('theater', 'theater.id = movie_schedule.theater.id')
        //         ->all();

        $scheduleSeatData = (new \yii\db\Query())
                ->from('movie_schedule_seat')
                ->where(['movie_schedule_id' => $schedule_id])
                ->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        // print_r($scheduleData);

        return $this->render('create_reservation', [
            'model' => $model,
            'scheduleSeat' => $scheduleSeatData,
            // 'schedule' => $scheduleData,
        ]);
    }

    /**
     * Updates an existing MovieReservation model.
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

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MovieReservation model.
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
     * Finds the MovieReservation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MovieReservation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MovieReservation::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
