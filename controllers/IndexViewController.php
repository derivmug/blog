<?php

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/ArticleModel.php';

class IndexViewController extends Controller {

    private $article_model;

    /**
     * Renders the index_view
     * 
     * @param string $view_path (optional) Path to the to be rendered view
     */
    public function render_view($view_path = null) {

        $this->article_model = new ArticleModel();

        $view_params['title'] = 'Index View';
        
        $view_params['logged_in'] = false;

        // Check whether the user is logged in
        if (isset($_SESSION['user_id'])) {

            $view_params['logged_in'] = true;
            $view_params['articles'] = $this->article_model->get_all();
            
        } 

        $this->create_view($view_path, $view_params);

    }

}

?>