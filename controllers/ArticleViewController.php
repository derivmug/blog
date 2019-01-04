<?php

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/ArticleModel.php';
include_once __DIR__.'/../models/UserModel.php';
include_once __DIR__.'/../models/CommentModel.php';

class ArticleViewController extends Controller {

    private $article_model;
    private $user_model;
    private $comment_model;

    /**
     * Renders and controls the article_view
     * 
     * @param string $view_path (optional) Path to render
     */
    public function render_view($view_path = null) {

        // Get Model instances
        $this->article_model = new ArticleModel();
        $this->user_model = new UserModel();
        $this->comment_model = new CommentModel();

        // Check whether the user is logged in
        $view_params['logged_in'] = isset($_SESSION['user_hash']);
       
        // Get article with additional information from other tables
        $article = $this->article_model->get_all_by_key_value('id', $_GET['id'])[0];
        $article['author_name'] = $this->user_model->get_all_by_key_value('id', $article['author_id'])[0]['name'];

        $view_params['article'] = $article;
        $view_params['comments'] = $this->get_comments($article['id']);

        // Save the article id in a session, required for comments
        $_SESSION['article_id'] = $article['id'];

        // Set the page title
        $view_params['title'] = $article['header'];

        $view_path = __DIR__.'/../views/article/article_view.php';
        $this->create_view($view_path, $view_params);

    }

    /**
     * Get all comments for this article
     * 
     * @param int $article_id The id of the article
     * 
     * @return array List of comments
     */
    private function get_comments($article_id) {

        // Get all comments for this article
        $article_comments = $this->comment_model->get_all_by_key_value('article_id', $article_id);

        foreach ($article_comments as $key => $comment) {

            // Add user_name and user_id to the article
            $user = $this->user_model->get_all_by_key_value('id', $comment['author_id'])[0];

            $article_comments[$key]['user_name'] = $user['name'];
            $article_comments[$key]['user_id'] = $user['id'];

        }

        return array_reverse($article_comments);

    }

}