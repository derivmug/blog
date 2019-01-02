<?php

include_once __DIR__.'/../framework/Controller.php';

class CreateArticleViewController extends Controller {

    /**
     * Renders the create_article_view
     * 
     * @param string $view_path (optional) Path to the to be rendered view
     */
    public function render_view($view_path = null) {

        $view_params['title'] = 'Index View';

        $view_path = __DIR__.'/../views/create_article_view.php';

        $this->create_view($view_path, $view_params);

    }


}