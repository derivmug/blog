<?php

include_once __DIR__.'/config/CONFIG.php';

include_once __DIR__.'/framework/router/Request.php';
include_once __DIR__.'/framework/router/Router.php';
include_once __DIR__.'/framework/Controller.php';
include_once __DIR__.'/framework/Model.php';

include_once __DIR__.'/controllers/IndexViewController.php';

// Create a new Router object
$router = new Router(new Request);

// Define default paths for header and footer files used by the controllers
Controller::set_default_header_path(__DIR__.'/views/default/header_view.php');
Controller::set_default_footer_path(__DIR__.'/views/default/footer_view.php');

// Create a php database object for the models
$pdo = new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASSWORD);
// Set PDO into error mode if the DEBUG config is true
if ($DEBUG_MODE) $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
Model::set_pdo($pdo);

// Index route
$router->get('/', function() {

    // Create the IndexController with a path to the index view
    $index_controller = new IndexController(__DIR__.'/views/index_view.php');
    $index_controller->render_view("Index view");

});

// Articles route - Display all articles
$router->get('/articles', function() {

    return "Article page";

});

