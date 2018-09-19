<?php
namespace App;
class App {
    function Homepage($f3, $args) {
        $f3->set('titolo','Home');
        $f3->set('contenuto','homepage.htm');
        echo \Template::instance()->render('templates/base.htm');
    }

    function Verifica($f3, $args) {
        $session = new \Session();
        //echo $session->ip();
        $f3->set('titolo','Verifica');
        $f3->set('contenuto','verifica.htm');
        echo \Template::instance()->render('templates/base.htm');
    }
}