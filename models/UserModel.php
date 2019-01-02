<?php

include_once __DIR__.'/../framework/Model.php';

class UserModel extends Model {

    function __construct() {

        parent::__construct('user', array('id', 'name', 'email', 'password'));

    }

}

