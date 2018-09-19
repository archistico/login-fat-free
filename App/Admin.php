<?php
namespace App;
class Admin {
    function beforeroute($f3) {
        $auth = \App\Auth::Autentica($f3); 
        if(!$auth) {
            \App\Flash::instance()->addMessage('Prima effettuare il login', 'danger');
            $f3->reroute('/login');
            $f3->set('logged', false);
        } else {
            $f3->set('logged', true);
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