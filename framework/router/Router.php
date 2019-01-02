<?php

class Router {

    private $request;
    private $supported_http_methods = array(
        "GET",
        "POST",
    );

    /**
     * Class constructor
     * 
     * @param IRequest $request The Request interface
     */
    function __construct(IRequest $request) {

        $this->request = $request;

    }


    /**
     * Special PHP method, called when the a nonexistend method is called on the object
     * 
     * Used to store method callbacks for routes
     * 
     * @param string $name The name of the nonexistend method
     * @param array $args The provided arguments
     */
    public function __call($name, $args) {

        list($route, $method) = $args;

        if (!in_array(strtoupper($name), $this->supported_http_methods)) {
            $this->invalid_method_handler();
        }

        $this->{strtolower($name)}[$this->format_route($route)] = $method;

    }


    /**
     * Removes the last '/', except if the route is '/'
     * 
     * @param string $route The route
     * 
     * @return string The formated route
     */
    private function format_route($route) {

        $result = rtrim($route, '/');

        if ($result === '') return '/';

        return $result;

    }


    /**
     * Handles methods not included in the supported_http_methods
     */
    private function invalid_method_handler() {

        header("{$this->request->server_protocol} 405 Method not allowed");

    }


    /**
     * Default handler, 404 routes
     */
    private function default_request_handler() {

        header("{$this->request->server_protocol} 404 Not Found");

    }


    /**
     * Resolves all routes specified
     */
    private function resolve() {

        $method_dictionary = $this->{strtolower($this->request->request_method)};
        $formated_route = $this->format_route($this->request->request_uri);
        $method = $method_dictionary[$formated_route];

        if (is_null($method)) {
            $this->default_request_handler();
            return;
        }

        echo call_user_func_array($method, array($this->request));

    }

    
    /**
     * Called when the object is dereferenced, e.g. at the end of the file
     */
    public function __destruct() {

        $this->resolve();

    }

}
