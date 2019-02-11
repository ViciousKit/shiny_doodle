<?php

require 'application/libs/Dev.php';
require 'application/core/Router.php';

session_start();

$router = new Router();
$router->run();

