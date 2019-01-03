<?php

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/ArticleModel.php';
include_once __DIR__.'/../models/UserModel.php';

class ArticlesViewController extends Controller {

    private $article_model;
    private $user_model;

    /**
     * Renders the articles view
     * 
     * @param string $view_path (optional) Path to the view
     */
    public function render_view($view_path = null) {

        $this->article_model = new ArticleModel();
        $this->user_model = new UserModel();

        $view_params['title'] = 'All articles';

        $view_path = __DIR__.'/../views/article/articles_view.php';

        $articles = $this->article_model->get_all();

        // Get articles from database
        $formatted_articles = array();
        foreach ($articles as $key => $article) {
            $author_name = $this->user_model->get_all_by_key_value('id', $article['author_id'])['name'];
            $article['author_name'] = $author_name;
            $formated_articles[] = $article;
        }

        $view_params['articles'] = array_reverse($formated_articles);
        $view_params['logged_in'] = isset($_SESSION['user_id']);

        $this->create_view($view_path, $view_params);

    }

}