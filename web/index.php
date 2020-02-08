<?php

  require('../vendor/autoload.php');

  // Include the Symfony Templating Engine required classes
  use Symfony\Component\Templating\PhpEngine;
  use Symfony\Component\Templating\TemplateNameParser;
  use Symfony\Component\Templating\Loader\FilesystemLoader;

  $app = new Silex\Application();
  $app['debug'] = true;

  // Register the monolog logging service
  $app->register(
    new Silex\Provider\MonologServiceProvider(),
    array(
      'monolog.logfile' => 'php://stderr'
    )
  );

  // Register view rendering
  $app->register(
    new Silex\Provider\TwigServiceProvider(),
    array(
      'twig.path' => __DIR__.'/views',
    )
  );

  // Register the templating provider
  $filesystemLoader = new FilesystemLoader(__DIR__.'/views/%name%');
  $app['templating'] = new PhpEngine(new TemplateNameParser(), $filesystemLoader);

  // Web handlers
  $app->get('/', function() use($app) {
    $app['monolog']->addDebug('logging output.');
    return $app['templating']->render('browse.php');
  })->bind('browse');

  $app->get('/details', function() use($app) {
    $app['monolog']->addDebug('logging output.');
    return $app['templating']->render('details.php');
  });

  $app->get('/orders', function() use($app) {
    $app['monolog']->addDebug('logging output.');
    return $app['templating']->render('orders.php');
  });

  $app->post('/results', function() use($app) {
    $app['monolog']->addDebug('logging output.');
    return $app['templating']->render('results.php', ['post' => $_POST]);
  });

  $app->post('/insert', function() use($app) {
    $app['monolog']->addDebug('logging output.');
    return $app['templating']->render('insert.php', ['post' => $_POST]);
  });

  $app->run();
?>
