<?php

include_once __DIR__.'/../framework/Controller.php';

class IndexController extends Controller {

    public function render_view($title) {

        $view_params['title'] = $title;

        $this->create_view($view_params);

    }

}

?>