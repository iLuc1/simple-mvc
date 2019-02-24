<?php

namespace Root;

class Container {

    public function initialize() {
        $this->initializeUser();
        new Router();
    }

    private function initializeUser() {
        session_start();

        if (!isset($_SESSION['user']))
            $this->setUser(null);
    }

    protected function setUser($usuario) {
        $_SESSION['user'] = $usuario;
    }

    protected function getUser() {
        return $_SESSION['user'];
    }

    public static function htmlGetUser() {
        return $_SESSION['user'];
    }

}