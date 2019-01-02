<?php

class Utils {

    // Not used at the moment

    /**
     * Converts a string with words separated by '_' to camelCase
     * 
     * @param string $string The string to be converted
     * 
     * @return string The to camelCase converted string
     */
    public static function toCamelCase($string) {

        $result = strtolower($string);

        preg_match_all('/_[a-z]/', $result, $matches);

        foreach ($matches[0] as $match) {
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }

        return $result;

    }

}

