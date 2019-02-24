<?php

namespace Root;

trait Entity {
    public function build($class, $args) {
        $class = new $class;
        foreach ($args as $column => $value) {
            if (strpos($column,'id_') !== false) {
                $class->setId($value);
            } else {
                $class->{'set'.ucfirst($column)}($value);
            }
        }

        return $class;
    }
}