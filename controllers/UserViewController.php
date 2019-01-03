<?php

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/ArticleModel.php';
include_once __DIR__.'/../models/UserModel.php';

class UserViewController extends Controller {

    public function render_view($view_path = null) {

        $view_path = __DIR__.'/../views/user/user_profile_view.php';

        $view_params['logged_in'] = isset($_SESSION['user_id']);

        $this->create_view($view_path, $view_params);

    }

}