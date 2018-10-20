<?php

namespace app\widgets;
use yii\base\Widget;

class MyWidget extends Widget
{
    public $message = 'MESSAGE_DEFAULT';

    public function init()
    {
        
    }
    
    public function run()
    {
        return $this->render("my", ['message' => $this->message]);
    }
}