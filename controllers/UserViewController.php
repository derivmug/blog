<?php

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/ArticleModel.php';
include_once __DIR__.'/../models/UserModel.php';

class UserViewController extends Controller {

    private $user_model;
    private $article_model;

    public function render_view($view_path = null) {

        $this->user_model = new UserModel();
        $this->article_model = new ArticleModel();

        $view_path = __DIR__.'/../views/user/user_profile_view.php';
        
        $user_name = $this->user_model->get_all_by_key_value('id', $_GET['id'])[0]['name'];

        $view_params['logged_in'] = isset($_SESSION['user_hash']);
        $view_params['user_name'] = $user_name;
        $view_params['title'] = 'Profile: '.$user_name;

        $user_articles = $this->article_model->get_all_by_key_value('author_id', $_GET['id']);

        // Add the author name, which is the user_name as only articles by this user are selected
        $formated_articles = array();
        foreach ($user_articles as $key => $article) {
            $article['author_name'] = $user_name;
            $formated_articles[] = $article;
        }

        $view_params['articles'] = array_reverse($formated_articles);

        $this->create_view($view_path, $view_params);

    }

}