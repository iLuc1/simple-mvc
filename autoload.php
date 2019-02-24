<?php

spl_autoload_register(function($class) {
    return require_once $class . '.php';
});