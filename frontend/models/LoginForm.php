<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['email', 'password'], 'required'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    // public function validatePassword($attribute, $params)
    // {
    //     if (!$this->hasErrors()) {
    //         $user = $this->getUser();
    //         if (!$user || !$user->validatePassword($this->password)) {
    //             $this->addError($attribute, 'Incorrect username or password.');
    //         }
    //     }
    // }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    // public function login()
    // {
    //     if ($this->validate()) {
    //         return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
    //     }
        
    //     return false;
    // }
    
    public function login()
    {
        //$user = $this->getUser();
        //$password_hash = $user->password_hash;
        
        $password_hash = User::find()
        ->select(["password_hash"])
        ->where(["email" => "$this->email"]);

        $apasi = (Yii::$app->getSecurity()->generatePasswordHash($this->password) == $password_hash);

        return $apasi;
        //return Yii::$app->getSecurity()->validatePassword($this->password, $password_hash);
    }
    
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::find()->where("email=$this->email");
        }

        return $this->_user;
    }
}
