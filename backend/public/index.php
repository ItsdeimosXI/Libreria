<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Raiz\Controllers\SocioController;

require __DIR__ . '../../vendor/autoload.php';

$app = AppFactory::create();

$app->addErrorMiddleware(displayErrorDetails: true, logErrors: true, logErrorDetails: true);

require_once('../rutas/socioRoutes.php');
require_once('../rutas/categoriasRoutes.php');
require_once('../rutas/autoresRoutes.php');
require_once('../rutas/librosRoutes.php');
require_once('../rutas/editorialesRoutes.php');
require_once('../rutas/PrestamosRoutes.php');
require_once('../rutas/generosRoutes.php');

$app->run();