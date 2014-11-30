<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
class CallbackForm extends Model
{
    public $name;
    public $phone;

    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string  $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail($email)
    {
        $html = '<p>'.$this->name.'would like order call on number'.$this->phone.'</p>';

        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setHtmlBody($html)
            ->send();
    }

}