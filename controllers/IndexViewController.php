<?php

include_once __DIR__.'/../framework/Controller.php';

class IndexViewController extends Controller {

    /**
     * Renders the index_view
     * 
     * @param string $view_path (optional) Path to the to be rendered view
     */
    public function render_view($view_path = null) {

        $view_params['title'] = 'Index View';

        $this->create_view($view_path, $view_params);

    }

}

?>