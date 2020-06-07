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
            $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            //$user->password_hash = md5($this->password);
            $user->save();
            return true;
        } else {
            // alert kalo email udah dipake
            return false;
        }
    }
}
