<?php

use App\Router;

$router = new Router();


if ($router->isApiCall()) {
    require 'routes/api.php';
    exit();
}
require 'routes/api.php';
//require 'routes/web.php';

