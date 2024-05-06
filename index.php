<?php
require_once('db/db.php');
require_once('router/router.php');

//GET DATABASE INSTANCE
$db = Database::getInstance()->getConnection();

//GET ROUTER INSTANCE
$router = new Router();

//ADD ROUTES
require_once ('routes/customer_routes.php');


// Manejar la solicitud utilizando el enrutador
$router->handleRequest();

$db->close();
