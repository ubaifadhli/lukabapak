<?php

namespace frontend\controllers;

use Yii;
use frontend\models\MovieReservation;
use frontend\models\MovieReservationSeat;
use frontend\models\UserBalance;
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

        $scheduleData = (new \yii\db\Query())
                ->select('movie_schedule.id, movie_schedule.movie_id, movie_schedule.theater_id, movie_schedule.date, theater.name')
                ->from('movie_schedule')
                ->where(['movie_schedule.id' => $schedule_id])
                ->innerJoin('theater', 'movie_schedule.theater_id = theater.id')
                ->all();

        $scheduleSeatData = (new \yii\db\Query())
                ->select('seat.id, seat.availability')
                ->from('movie_schedule_seat')
                ->where(['movie_schedule_id' => $schedule_id])
                ->innerJoin('seat', 'movie_schedule_seat.seat_id = seat.id')
                ->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        // print_r($scheduleSeatData);
        // echo count($scheduleSeatData);

        return $this->render('create_reservation', [
            'model' => $model,
            'scheduleSeat' => $scheduleSeatData,
            'schedule' => $scheduleData,
        ]);
    }

    public function actionProcessReservation()
    {
      if($_SESSION['balance'] < $_SESSION['total_price']) {
        Yii::$app->session->setFlash('error', "You have insufficient balance.");
        return $this->redirect(array("site/index"));

        unset($_SESSION['schedule_id']);
        unset($_SESSION['total_price']);
        unset($_SESSION['seat']);
      } else {
        $currentDate = date("d F Y");

        //nyimpen reservation
        $movieReservation = new MovieReservation();
        $movieReservation->user_id = $_SESSION['user_id'];
        $movieReservation->movie_schedule_id = $_SESSION['schedule_id'];
        $movieReservation->date = $currentDate;
        if($movieReservation->save()) $lastID = $movieReservation->id;

        //nyimpen seat
        for($i = 0; $i < count($_SESSION['seat']); $i++) {
          $movieReservationSeat = new MovieReservationSeat();
          $movieReservationSeat->movie_reservation_id = $lastID;
          $movieReservationSeat->seat_id = $_SESSION['seat'][$i];
          $movieReservationSeat->save();
        }

        //update Balance
        $userBalance = UserBalance::findOne($_SESSION['user_id']);
        $userBalance->balance = strval(intval($_SESSION['balance'] - $_SESSION['total_price']));
        $userBalance->save();

        unset($_SESSION['schedule_id']);
        unset($_SESSION['total_price']);
        unset($_SESSION['seat']);
        unset($_SESSION['balance']);


        Yii::$app->session->setFlash('success', "Reservation completed! Check your reservation in your profile page.");
        return $this->redirect(array("site/index"));
      }




    }

    public function actionFinishPayment()
    {
      $seatData = Yii::$app->request->get('seat');

      $schedule_id = Yii::$app->request->get('schedule_id');

      $scheduleData = (new \yii\db\Query())
              ->select('movie_schedule.id, movie_schedule.movie_id, movie_schedule.theater_id, movie_schedule.date, theater.name')
              ->from('movie_schedule')
              ->where(['movie_schedule.id' => $schedule_id])
              ->innerJoin('theater', 'movie_schedule.theater_id = theater.id')
              ->all();

      $movie = (new \yii\db\Query())
              ->select('movie.title, movie_price.price')
              ->from('movie')
              ->where(['id' => $scheduleData[0]['movie_id']])
              ->innerJoin('movie_price', 'movie.id = movie_price.movie_id')
              ->all();

      $userBalance = UserBalance::find()
                      ->where(['user_id' => Yii::$app->session->get('user_id')])
                      ->asArray()
                      ->all();

      $totalPrice = intval($movie[0]['price']) * count($seatData);

      // echo $totalPrice;

      $_SESSION['schedule_id'] = $schedule_id;
      $_SESSION['total_price'] = $totalPrice;
      for($i = 0; $i < count($seatData); $i++) {
        $_SESSION['seat'][$i] = $seatData[$i];
      }
      $_SESSION['balance'] = $userBalance[0]['balance'];

      // echo $_SESSION['schedule_id'];

      // echo intval($_SESSION['balance'] - $_SESSION['total_price']);

      return $this->render('finish_payment', [
        'schedule' => $scheduleData,
        'movie' => $movie,
        'user_balance' => $userBalance,
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
