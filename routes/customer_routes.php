<?php


global $router;
require_once('controllers/customer_controller.php');

$router->addRoute('GET', '/api-test/v0/customers', function () {
   $customerController = new CustomerController();
   $customerController->getCustomers();
});


?>