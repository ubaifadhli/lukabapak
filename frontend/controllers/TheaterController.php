<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Theater;
use frontend\models\TheaterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TheaterController implements the CRUD actions for Theater model.
 */
class TheaterController extends Controller
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
     * Lists all Theater models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TheaterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Theater model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $movieSchedule = (new \yii\db\Query())
                ->from('movie_schedule')
                ->where(['theater_id' => $id])
                ->limit(1)
                ->all();

        //designed to get only 1 data, should be scaled later.
        $movieData = (new \yii\db\Query())
                ->select('movie.id, movie.title, movie.rating, movie.image_path, movie.screen_quality, movie_price.price')
                ->from('movie, movie_price')
                ->where(['movie.id' => $movieSchedule[0]['movie_id'], 'movie_price.movie_id' => $movieSchedule[0]['movie_id'] ])
                ->limit(1)
                ->all();

        // print_r($movieData);

        return $this->render('theater_current_movie', [
            'model' => $this->findModel($id),
            'schedule' => $movieSchedule,
            'movie' => $movieData,
        ]);
    }

    /**
     * Creates a new Theater model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Theater();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Theater model.
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
     * Deletes an existing Theater model.
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
     * Finds the Theater model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Theater the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Theater::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
