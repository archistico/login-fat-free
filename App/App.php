<?php
namespace App;
class App {

    function beforeroute($f3) {
        $auth = \App\Auth::Autentica($f3); 
        if(!$auth) {
            $f3->set('logged', false);
        } else {
            $f3->set('logged', true);
        }
    }

    function Homepage($f3, $args) {
        $f3->set('titolo','Home');
        $f3->set('contenuto','homepage.htm');
        echo \Template::instance()->render('templates/base.htm');
    }
}