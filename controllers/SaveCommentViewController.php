<?php

include_once __DIR__.'/../framework/Controller.php';

include_once __DIR__.'/../models/CommentModel.php';

class SaveCommentViewController extends Controller {

    private $comment_model;

    /**
     * Controls and optionally renders the save_comment view
     */
    public function render_view($view_path = null) {

        $this->comment_model = new CommentModel();

        $view_params['title'] = 'Save comment';

        if ($view_params['saved_successfully'] = $this->save_comment()) {

            header('Location: /article?id='.$_SESSION['article_id']);

        } else {

            $this->create_view(__DIR__.'/../views/comment/save_comment.php', $view_params);

        }

    }


    /**
     * Saves the comment
     * 
     * @return bool True if the operation was successful, false otherwise
     */
    private function save_comment() {

        // Make sure an article_id has been set
        if (!isset($_SESSION['article_id'])) return false;

        $result = $this->comment_model->create_new(array(
            'content' => $this->params['comment_content'],
            'author_id' => $_SESSION['user_id'],
            'article_id' => $_SESSION['article_id']
        ));

        return $result;

    }

}