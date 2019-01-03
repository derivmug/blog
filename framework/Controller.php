<?php

abstract class Controller {

    private static $default_header_path;
    private static $default_footer_path;
    
    protected $params;

    /**
     * Class constructor
     * 
     * @param array $params (optional) URI params
     */
    function __construct($params = array()) {

        $this->params = $params;

    }


    /**
     * Abstract method to be implement by child class
     * 
     * @param string $title The title of the webpage
     */
    abstract public function render_view($view_path = null);


    /**
     * Creates a view by rendering the default header, the specified view and the default footer
     * 
     * @param array $view_params An associative array with things to output on the view 
     */
    protected function create_view($view_path, $view_params) {

        require_once(self::$default_header_path);
        require_once($view_path);
        require_once(self::$default_footer_path);

    }


    /**
     * Sets the path for the default header view
     * 
     * @param string $path Absolute path to the header view file
     */
    public static function set_default_header_path($path) {

        self::$default_header_path = $path;

    }


    /**
     * Sets the path for the default footer view
     * 
     * @param string $path Absolute path to the footer view file
     */
    public static function set_default_footer_path($path) {

        self::$default_footer_path = $path;

    }

}

