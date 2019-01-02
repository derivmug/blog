<?php
session_start();

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/UserModel.php';

class RegisterViewController extends Controller {

    private $user_model;

    public function render_view() {

        $this->user_model = new UserModel();

        $view_params = $this->params;

        if ($this->handle_registration()) {
            // Successful registration
        } else {

        }

        $view_params['title'] = 'Register View';

        $this->create_view($view_params);

    }

    private function handle_registration() {

        if ($this->validate_input()) {

            // Hash the password
            $password_hash = password_hash($_POST['user_password'], PASSWORD_DEFAULT);

            // Store new user in database
            $result = $this->user_model->create_new(array(
                'name' => $_POST['user_name'],
                'email' => $_POST['user_email'],
                'password' => $password_hash,
            ));

            $user_id = $this->user_model->get_last_insert_id();
            echo $user_id;

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