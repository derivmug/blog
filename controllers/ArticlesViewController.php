<?php

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/ArticleModel.php';

class ArticlesViewController extends Controller {

    private $article_model;

    /**
     * Renders the articles view
     * 
     * @param string $view_path (optional) Path to the view
     */
    public function render_view($view_path = null) {

        $this->article_model = new ArticleModel();

        $view_params['title'] = 'All articles';

        $view_path = __DIR__.'/../views/article/articles_view.php';

        $view_params['articles'] = $this->article_model->get_all();

        $this->create_view($view_path, $view_params);

    }

}