<?php

include_once __DIR__.'/../framework/Model.php';

class ArticleModel extends Model {

    function __construct() {

        parent::__construct('article', array('id', 'header', 'content', 'created_at', 'updated_at', 'author_id'));

    }

}

