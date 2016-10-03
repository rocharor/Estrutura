<?php

$app = new Silex\Application();
$app['debug'] = true;

$app->mount('/', new Rocharor\Site\Controllers\RotaSite());
$app->mount('/admin', new Rocharor\Admin\Controllers\RotaAdmin());

$app->run();
