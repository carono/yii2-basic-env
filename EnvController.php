<?php

namespace carono\env;

use yii\helpers\Console;
use yii\helpers\FileHelper;

class EnvController extends \yii\console\Controller
{
    public function actionIndex()
    {
        $app = \Yii::getAlias('@app');
        $vendor = \Yii::getAlias('@vendor/carono/yii2-basic-env');
        $src = \Yii::getAlias('@vendor/carono/yii2-basic-env/environments');
        $dst = \Yii::getAlias('@app/environments');
        if (!is_dir($dst) || Console::confirm('Rewrite all files in @app/environments')) {
            FileHelper::copyDirectory($src, $dst);
        }
        copy($vendor . '/init', $app . '/init');
        copy($vendor . '/init.bat', $app . '/init.bat');
        chmod(\Yii::getAlias('@app/init'), 0777);
        Console::output('Files copied successfully');
    }
}