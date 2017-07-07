<?php

namespace carono\env;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        if ($app instanceof \yii\console\Application) {
            if (!isset($app->controllerMap['env'])) {
                $app->controllerMap['env'] = 'carono\env\EnvController';
            }
        }
    }
}