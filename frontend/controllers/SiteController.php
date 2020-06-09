<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\City;
use frontend\models\RegisterForm;
use frontend\models\EditProfileForm;
use frontend\models\MovieReservation;
use frontend\models\UserBalance;
use frontend\models\User;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $movie_nowplaying = (new \yii\db\Query())
                ->from('movie')
                ->where(['status_id' => 1])
                ->limit(3)
                ->orderBy('id DESC')
                ->all();

        $movie_upcoming = (new \yii\db\Query())
                ->from('movie')
                ->where(['status_id' => 0])
                ->limit(3)
                ->orderBy('id DESC')
                ->all();

        return $this->render('home', array( 'movie_nowplaying' => $movie_nowplaying,
                                            'movie_upcoming' => $movie_upcoming));
    }

    public function actionTheater()
    {
        $city = City::find()->asArray()->all();

        $theater = (new \yii\db\Query())
                ->select(['id', 'name', 'city_id', 'address'])
                ->from('theater')
                ->all();

        // $theater = Theater::find()->asArray()->all();

        // print_r($theater);

        return $this->render('theater', array('city' => $city,
                                              'theater' => $theater));
    }

    public function actionTopup()
    {
        return $this->render('topup');
    }

    public function actionProcessTopup()
    {
        $balance = Yii::$app->request->get('balance');
        $userBalance = UserBalance::findOne($_SESSION['user_id']);
        $userBalance->balance = strval(intval($userBalance->balance + $balance));
        
        // $user_id = $_SESSION['user_id'];

        // $userBalance = UserBalance::find()
        //             ->where(["user_id" => $user_id])
        //             ->asArray();

        // print_r($userBalance);
        // $userBalance->balance += $balance;

        if ($userBalance->save()) {
            Yii::$app->session->setFlash('success', "Top Up Success!");
            return $this->redirect(array("site/index"));
        } else {
            Yii::$app->session->setFlash('error', "Top Up Failed!");
            return $this->redirect(array("site/topup"));
        }
    }

    public function actionProfile()
    {
        $model = User::findOne($_SESSION['user_id']);
        $balance = UserBalance::findOne($_SESSION['user_id']);

        // $history = MovieReservation::find()
        //             ->where(['user_id' => $_SESSION['user_id']])
        //             ->innerJoin('movie_schedule', 'movie_reservation.movie_schedule_id = movie_schedule.id')
        //             ->innerJoin('movie', 'movie_schedule.movie_id = movie.id')
        //             ->asArray()
        //             ->all();

        // $history = MovieReservation::find()->where(['user_id' => $_SESSION['user_id']])->joinWith([
        //     'movie_schedule' => function ($query) {
        //         $query->onCondition(['movie_schedule.id' => 'movie_reservation.movie_schedule_id']);
        //     },
        //     'movie' => function ($query2) {
        //         $query2->onCondition(['movie.id' => 'movie_schedule.movie_id']);
        //     },
        // ])->all();

        return $this->render('profile', array('model' => $model,
                                              'balance' => $balance));
    }

    public function actionEditProfile()
    {
        $model = User::findOne($_SESSION['user_id']);

        if(Yii::$app->request->get('name') != null) {
            $name = Yii::$app->request->get('name');
            $model->name = $name;
            $_SESSION['name'] = $name;
        }
        
        if(Yii::$app->request->get('email') != null) {
            $model->email = Yii::$app->request->get('email');
        }

        $password = Yii::$app->request->get('password');
        $confirmPassword = Yii::$app->request->get('confirm-password');

        if($password != null && $confirmPassword != null) {
            if(strcmp($password, $confirmPassword)) {
                $model->password_hash = md5($password);
            }
        }

        if ($model->save()) {
            Yii::$app->session->setFlash('success', "Profile Edited Successfully!");
            return $this->redirect(array("site/index"));
        } else {
            Yii::$app->session->setFlash('error', "Profile Edit Failed!");
            return $this->redirect(array("site/profile"));
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->actionIndex();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionRegister()
    {
        $model = new RegisterForm();

        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            Yii::$app->session->setFlash('success', "Your account has been created!");
            return $this->redirect(array("site/index"));
        } else {
            return $this->render('register', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
