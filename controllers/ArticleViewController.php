<?php

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/ArticleModel.php';
include_once __DIR__.'/../models/UserModel.php';
include_once __DIR__.'/../models/CommentModel.php';

class ArticleViewController extends Controller {

    private $article_model;
    private $user_model;
    private $comment_model;

    public function render_view($view_path = null) {

        $this->article_model = new ArticleModel();
        $this->user_model = new UserModel();
        $this->comment_model = new CommentModel();

        // Check whether the user is logged in
        $view_params['logged_in'] = isset($_SESSION['id']);
       
        // Get article with additional information from other tables
        $article = $this->article_model->get_all_by_key_value('id', $_GET['id'])[0];
        $article['author_name'] = $this->user_model->get_all_by_key_value('id', $article['author_id'])[0]['name'];

        $view_params['article'] = $article;

        // Set the page title
        $view_params['title'] = $article['header'];

        $view_path = __DIR__.'/../views/article/article_view.php';
        $this->create_view($view_path, $view_params);

    }

}