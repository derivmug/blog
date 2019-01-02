<?php

include_once __DIR__.'/../framework/Model.php';

class ArticleModel extends Model {

    /**
     * Class constructor, calls the constructor of the parent class Model with values specific for the Article table
     */
    function __construct() {

        parent::__construct('article', array('id', 'header', 'content', 'created_at', 'updated_at', 'author_id'));

    }

}

