<?php

namespace Root;

class Controller extends Container {
    protected function render($view, $args = []) {
        return require_once 'Src/Views/' . $view . '.view.php';
    }
}