<?php 

namespace Core;

class View {
    /**
     * Summary of render
     * @param mixed $view
     * @param mixed $data
     * @return void
     */
    public static function render($view, $data = []) {
        extract($data);
        require __DIR__ . '/../views/' . $view . '.php';
    }
}