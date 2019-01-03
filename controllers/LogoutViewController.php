<?php

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/UserModel.php';

class LogoutViewController extends Controller {

    public function render_view($view_path = null) {

        session_destroy();

        header('Location: /');

    }

}