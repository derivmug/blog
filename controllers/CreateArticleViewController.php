<?php

include_once __DIR__.'/../framework/Controller.php';

class CreateArticleViewController extends Controller {

    /**
     * Renders the create_article_view
     * 
     * @param string $view_path (optional) Path to the to be rendered view
     */
    public function render_view($view_path = null) {

        $view_params['title'] = 'Create Article';

        $view_path = __DIR__.'/../views/create_article_view.php';

        if (isset($_SESSION['user_id'])) {
    
            $view_params['logged_in'] = true;
            
        } else {

            $view_params['logged_in'] = false;

        }

        $this->create_view($view_path, $view_params);

    }


}