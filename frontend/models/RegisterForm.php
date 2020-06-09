<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class RegisterForm extends Model
{
    public $name;
    public $email;
    public $password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password_hash'], 'required'],
        ];
    }
    
    public function register()
    {
        $isEmailUsed = User::find()->where(["email" => "$this->email"])->one();
        
        if($isEmailUsed == null) {
            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->password_hash = md5($this->password);
            $user->save();

            $user_id = User::find()->select(["id"])->where(["email" => $user->email]);

            $user_id = (new \yii\db\Query())
                ->from('user')
                ->where(['email' => $user->email])
                ->all();

            $userBalance = new UserBalance();
            $userBalance->user_id = $user_id[0]['id'];
            $userBalance->save();

            return true;
        } else {
            echo "<script>alert('EMAIL HAS ALREADY BEEN USED');</script>";
            return false;
        }
    }
}
