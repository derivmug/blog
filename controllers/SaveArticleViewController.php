<?php

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/ArticleModel.php';

class SaveArticleViewController extends Controller {

    private $article_model;

    public function render_view($view_path = null) {

        $this->article_model = new ArticleModel();

        $view_params['title'] = 'Save article';

        $view_params['saved_article'] = $this->save_article();

        $this->create_view(__DIR__.'/../views/article/save_article_view.php', $view_params);

    }


    private function save_article() {

        $result = $this->article_model->create_new(array(
            'header' => $this->params['article_header'],
            'content' => $this->params['article_content'],
            'author_id' => $_SESSION['user_id'],
        ));

        return $result;

    }

}