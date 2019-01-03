<?php

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/ArticleModel.php';
include_once __DIR__.'/../models/UserModel.php';

class UserViewController extends Controller {

    private $user_model;

    public function render_view($view_path = null) {

        $this->user_model = new UserModel();

        $view_path = __DIR__.'/../views/user/user_profile_view.php';

        $view_params['logged_in'] = isset($_SESSION['user_id']);
        $view_params['user_name'] = $this->user_model->get_all_by_key_value('id', $_SESSION['user_id'])['name'];

        $this->create_view($view_path, $view_params);

    }

}