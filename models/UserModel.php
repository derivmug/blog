<?php

include_once __DIR__.'/../framework/Model.php';

class UserModel extends Model {

    /**
     * Class constructor, calls the constructor of the parent class Model with values specific for the User table
     */
    function __construct() {

        parent::__construct('user', array('id', 'name', 'email', 'password'));

    }

}

