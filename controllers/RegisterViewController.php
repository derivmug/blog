<?php

include_once __DIR__.'/../framework/Controller.php';

class RegisterViewController extends Controller {

    public function render_view() {

        if ($this->handle_registration()) {
            // Successful registration
        } else {

        }

        $view_params['title'] = 'Register View';

        $this->create_view($view_params);

    }

    private function handle_registration() {

        var_dump($this->params);

    }

}