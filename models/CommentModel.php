<?php

include_once __DIR__.'/../framework/Model.php';

class CommentModel extends Model {

    /**
     * Class constructor, calls parent class constructor with Comment specific values
     */
    function __construct() {

        parent::__construct('comment', array('id', 'content', 'created_at', 'updated_at', 'author_id', 'article_id'));

    }

}
