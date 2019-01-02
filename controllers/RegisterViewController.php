<?php

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/UserModel.php';

class RegisterViewController extends Controller {

    private $user_model;

    public function render_view($view_path = null) {

        $this->user_model = new UserModel();

        $view_params = array();

        if ($this->handle_registration()) {

            // Successful registration
            $view_path = __DIR__.'/../views/register/successful_view.php';
            $view_params['user_name'] = $this->params['user_name'];

        } else {

            // Unsuccessful registration
            $view_path = __DIR__.'/../views/register/unsuccessful_view.php';
        }

        $view_params['title'] = 'Register View';

        $this->create_view($view_path, $view_params);

    }

    private function handle_registration() {

        if ($this->validate_input()) {

            // Hash the password
            $password_hash = password_hash($this->params['user_password'], PASSWORD_DEFAULT);

            // Store new user in database
            $result = $this->user_model->create_new(array(
                'name' => $this->params['user_name'],
                'email' => $this->params['user_email'],
                'password' => $password_hash,
            ));

            if ($result) {

                // If the insert was successful log in the user by creating a new session
                $user_id = $this->user_model->get_last_insert_id();
                $_SESSION['user_id'] = $user_id;

            }

            return $result;

        }

        return false;

    }

    private function validate_input() {

        // TODO: Display error messages to user in a better way
        $error = false;

        // Validate email
        if (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {

            $error = true;
            echo "Email is invalid";

        }

        // Password must be at least 8 chars long
        // TODO: Better password validation
        if (strlen($_POST['user_password']) < 8) {

            $error = true;
            echo "Password must be at last eight characters long";

        }

        // Both passwords must be equal
        if ($_POST['user_password'] != $_POST['user_password_confirm']) {

            $error = true;
            echo "Passwords don't match";

        }

        // Check whether the email has already been taken
        $entries = $this->user_model->get_all_by_key_value('email', $_POST['user_email']);
        if ($entries) {

            $error = true;
            echo "Email has already been taken";

        }

        return !$error;

    }

}