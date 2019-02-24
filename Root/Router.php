<?php

namespace Root;

class Router {
    public function __construct() {
        $reference = str_replace(dirname($_SERVER['PHP_SELF']), '', $_SERVER['REQUEST_URI']);

        if (isset($_GET['id']))
            $reference = str_replace($_GET['id'], '', $reference);

        $routing = require_once 'Root/Routing.php';

        foreach ($routing as $route => $function) {
            if ($reference == $route || $reference . '/' == $route) {
                $function = explode('::', $function);
                return (new $function[0])->$function[1]();
            }
        }
    }

    public static function generate($route) {
        return 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/' . $route;
    }

    public static function redirect($route) {
        $route = self::generate($route);
        header("location:$route");
    }
}