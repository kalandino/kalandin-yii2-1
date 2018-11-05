<?php

namespace app\assets;

use yii\web\AssetBundle;

class CalendarAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/calendar.css',
    ];
    public $js = [
        'js/script.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'app\assets\AppAsset',
    ];
}
