<?php

include_once __DIR__.'/../framework/Model.php';

include_once __DIR__.'/UserModel.php';

class ArticleModel extends Model {

    /**
     * Class constructor, calls the constructor of the parent class Model with values specific for the Article table
     */
    function __construct() {

        parent::__construct('article', array('id', 'header', 'content', 'created_at', 'updated_at', 'author_id'));

    }


    /**
     * Returns an array of all articles with the author's name
     * 
     * @return array List of articles with author_name
     */
    public function get_articles_with_author() {

        $user_model = new UserModel();

        $articles = $this->get_all();

        $formated_articles = array();
        foreach ($articles as $key => $article) {
            $author_name = $user_model->get_all_by_key_value('id', $article['author_id'])[0]['name'];
            $article['author_name'] = $author_name;
            $formated_articles[] = $article;
        }

        return array_reverse($formated_articles);

    }
}

