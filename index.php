<?php

session_start();

include_once __DIR__.'/config/CONFIG.php';

include_once __DIR__.'/framework/router/Request.php';
include_once __DIR__.'/framework/router/Router.php';
include_once __DIR__.'/framework/Controller.php';
include_once __DIR__.'/framework/Model.php';

include_once __DIR__.'/controllers/IndexViewController.php';
include_once __DIR__.'/controllers/RegisterViewController.php';
include_once __DIR__.'/controllers/LoginViewController.php';
include_once __DIR__.'/controllers/CreateArticleViewController.php';
include_once __DIR__.'/controllers/SaveArticleViewController.php';
include_once __DIR__.'/controllers/ArticlesViewController.php';
include_once __DIR__.'/controllers/LogoutViewController.php';
include_once __DIR__.'/controllers/UserViewController.php';

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
$router->get('/', function($request) {

    // Create the IndexController with a path to the index view
    $index_controller = new IndexViewController();
    $index_controller->render_view(__DIR__.'/views/index_view.php');

});

// Used to register a new user
$router->post('/register', function($request) {

    $register_controller = new RegisterViewController($request->get_body());
    $register_controller->render_view();

});

// Used to log in a user
$router->post('/login', function($request) {

    $login_controller = new LoginViewController($request->get_body());
    $login_controller->render_view();

});

// Save an article
$router->post('/save_article', function($request) {

    $save_article_controller = new SaveArticleViewController($request->get_body());
    $save_article_controller->render_view();

});

// Display all articles
$router->get('/articles', function($request) {

    $articles_controller = new ArticlesViewController($request->get_body());
    $articles_controller->render_view();

});

// Used for log out
$router->get('/logout', function($request) {

    $logout_controller = new LogoutViewController();
    $logout_controller->render_view();

});

// View user profiles
$router->get('/user', function($request) {

    $user_view_controller = new UserViewController();
    $user_view_controller->render_view();

});
