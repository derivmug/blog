<?php

include_once __DIR__.'/../framework/Controller.php';

class IndexViewController extends Controller {

    public function render_view() {

        $view_params['title'] = 'Index View';

        $this->create_view($view_params);

    }

}

?>