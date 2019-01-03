<?php

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/ArticleModel.php';
include_once __DIR__.'/../models/UserModel.php';

class IndexViewController extends Controller {

    private $article_model;
    private $user_model;

    /**
     * Renders the index_view
     * 
     * @param string $view_path (optional) Path to the to be rendered view
     */
    public function render_view($view_path = null) {

        $view_params['title'] = 'Index View';
        
        $view_params['logged_in'] = false;

        // Check whether the user is logged in
        if (isset($_SESSION['user_id'])) {

            $this->article_model = new ArticleModel();
            $this->user_model = new UserModel();

            $view_params['logged_in'] = true;
            $view_params['articles'] = $this->article_model->get_articles_with_author();

            // Get the name of the user
            $user = $this->user_model->get_all_by_key_value('id', $_SESSION['user_id'])[0];
            $view_params['user_name'] = $user['name'];
            
        } 

        $this->create_view($view_path, $view_params);

    }

}

?>