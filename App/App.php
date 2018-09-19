<?php
namespace App;
class App {
    function Homepage($f3, $args) {
        $f3->set('titolo','Home');
        $f3->set('contenuto','homepage.htm');
        echo \Template::instance()->render('templates/base.htm');
    }
}