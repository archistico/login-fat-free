<?php
namespace App;
class Admin {
    function beforeroute($f3) {
        if(!\App\Auth::Autentica($f3)) {
            \App\Flash::instance()->addMessage('Prima effettuare il login', 'danger');
            $f3->reroute('/login');
        }
    }

    function Verifica($f3, $args) {
        $session = new \Session();
        //echo $session->ip();
        $f3->set('titolo','Verifica');
        $f3->set('contenuto','verifica.htm');
        echo \Template::instance()->render('templates/base.htm');
    }
}