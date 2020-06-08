<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

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
    
    public function login()
    {
        $user = (new \yii\db\Query())
                ->from('user')
                ->where(['email' => $this->email])
                ->all();

        $password_hash = $user[0]['password_hash'];
        $input_pass = md5($this->password);

        if (strcmp($input_pass, $password_hash)) {
            session_start();
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['name'] = $user[0]['name'];
            return true;
        } else {
            return false;
        }
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
