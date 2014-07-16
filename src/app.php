<?php

use Silex\Application;

use Silex\Provider\TwigServiceProvider;

$app = new Application();

$app->register(new TwigServiceProvider(), array(
    'twig.path'    => array(
        __DIR__.'/Resources/views',
        __DIR__.'/../cache/twig'
    ),
    // descomenta esta línea para activar la cache de Twig
    //'twig.options' => array('cache' => __DIR__.'/../cache/twig'),
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

return $app;