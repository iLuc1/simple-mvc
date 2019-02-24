<?php

namespace Root;

class Request {
    public static function getData($class) {
        if ($_POST) {
            $class = new $class;
            foreach($_POST as $column => $value) {
                $class->{'set' . ucfirst($column)}($value);
            }

            return $class;
        }

        return null;
    }

    public static function getParamId(){
        return isset($_GET['id']) ? $_GET['id'] : null;
    }
}