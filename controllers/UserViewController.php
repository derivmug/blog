<?php

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/ArticleModel.php';
include_once __DIR__.'/../models/UserModel.php';

class UserViewController extends Controller {

    public function render_view($view_path = null) {

        var_dump($_GET);

    }

}