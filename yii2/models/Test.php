<?php

namespace app\models;

use yii\base\Model;

class Test extends Model
{
	public $title;
	public $content;

	public function rules()
	{
		return [
			[['title'], 'myValidate'],
			[['content'], 'safe']
		];
	}

	public function myValidate($attribute, $params)
	{
		if($this->$attribute != 'Yii2') {
			$this->addError($attribute, 'Валидация не прошла');
		}
	}
}
