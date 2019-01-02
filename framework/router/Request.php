<?php

include_once __DIR__.'/IRequest.php';
include_once __DIR__.'/../Utils.php';

class Request implements IRequest {

    /**
     * Class constructor
     */
    function __construct() {

        $this->bootstrap_self();

    }

    /**
     * Stores all values in $_SERVER as properties of this object
     */
    private function bootstrap_self() {

        foreach ($_SERVER as $key => $value) {
            $this->{strtolower($key)} = $value;
        }

    }

    /**
     * Returns the request body
     * 
     * @return array Returns the request body, used by e.g. POST requests to transmit values
     */
    public function get_body() {

        if ($this->request_method === "GET") return;

        if ($this->request_method === "POST") {

            $result = array();

            // Get all post parameters
            foreach ($_POST as $key => $value) {
                $result[$key] = filter_input(INPUST_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }

            return $result;

        }

        return $body;

    }

}
