<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * RegistrationForm is the model behind the registration form.
 *
 * @property $login
 * @property $password
 *
 */
class RegistrationForm extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['login', 'password'], 'required'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->login || !$this->password) {
            $this->addError($attribute, 'Incorrect username or password.');
        }
    }
}
