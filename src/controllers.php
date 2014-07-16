<?php

//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app->get('/index2', function () use ($app) {
    return new Response($app['twig']->render('index.html.twig'));
})
->bind('index2');

$app->get('/contacto', function () use ($app) {
    return new Response($app['twig']->render('contact.html.twig'));
})
->bind('contact');

$app->get('/quienes-somos', function () use ($app) {
    return new Response($app['twig']->render('whoWeAre.html.twig'));
})
->bind('who');

$app->get('/alotofus', function () use ($app) {
    return new Response($app['twig']->render('alotofus.html.twig'));
})
->bind('alotofus');

$app->get('/marketing', function () use ($app) {
    return new Response($app['twig']->render('marketing.html.twig'));
})
->bind('marketing');

$app->get('/diseno-desarrollo', function () use ($app) {
    return new Response($app['twig']->render('design.html.twig'));
})
->bind('design');

$app->get('/ecommerce', function () use ($app) {
    return new Response($app['twig']->render('ecommerce.html.twig'));
})
->bind('ecommerce');

$app->get('/gestion-personas', function () use ($app) {
    return new Response($app['twig']->render('rrhh.html.twig'));
})
->bind('rrhh');

$app->get('/', function () use ($app) {
    return new Response($app['twig']->render('index-onePage.html.twig'));
})
->bind('portada');



