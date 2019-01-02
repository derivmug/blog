<?php

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/UserModel.php';

class LoginViewController extends Controller {

    private $user_model;

    private $user;

    /**
     * Renders the login_view
     * 
     * @param string $view_path (optional) Path to the to be rendered view
     */
    public function render_view($view_path = null) {

        $this->user_model = new UserModel();

        $view_params = array();

        if ($this->handle_login()) {

            // Successful login
            $view_path = __DIR__.'/../views/login/successful_view.php';
            $view_params['user_name'] = $this->user['name'];

        } else {

            // Unsuccessful login
            $view_path = __DIR__.'/../views/long/unsuccessful_view.php';

        }

        $view_params['title'] = 'Login View';

        $this->create_view($view_path, $view_params);

    }


    /**
     * Handels the log in
     * 
     * @return bool True if login was successful, false if not
     */
    private function handle_login() {

        $this->user = $this->user_model->get_all_by_key_value('email', $this->params['user_email']);

        if ($this->user && password_verify($this->params['user_password'], $this->user['password'])) {

            $_SESSION['user_id'] = $this->user['id'];

            return true;

        }

        return false;

    }


}