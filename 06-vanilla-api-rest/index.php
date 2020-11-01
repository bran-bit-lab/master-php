<?php  

require_once './server/config.php';
require_once './autoload.php';

use heroes\routes\HeroeRoutes;

$routes = new HeroeRoutes();
