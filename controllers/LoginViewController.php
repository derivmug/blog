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

            // Redirect the user to the index page if login was successful
            header('Location: /');

        } else {

            // Unsuccessful login
            $view_path = __DIR__.'/../views/login/unsuccessful_view.php';

            $view_params['logged_in'] = false;

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

        // Validate input and return false if it's invalid
        if (!$this->validate_input()) return false;

        $user_query = $this->user_model->get_all_by_key_value('email', $this->params['user_email']);
        if (sizeof($user_query) > 0) {

            $this->user = $user_query[0];

        } else {
            
            return false;

        }

        if ($this->user && password_verify($this->params['user_password'], $this->user['password'])) {

            $_SESSION['user_hash'] = hash('sha256', $this->user['email']);

            return true;

        }

        return false;

    }


    private function validate_input() {

        // Validate email
        if (!filter_var($this->params['user_email'], FILTER_VALIDATE_EMAIL)) return false;

        // Validate password
        if (strlen($this->params['user_password']) < 8) return false;

        return true;

    }


}