<?php
namespace App;
class Auth {
    function Login($f3, $args) {
        
        // CSRF
        $session = new \Session();
        $csrf = $session->csrf();
        $f3->set('token', $csrf);
        $f3->set('SESSION.csrf', $csrf);

        echo \Template::instance()->render('templates/login.htm');
    }

    function Logout($f3, $args) {
        $f3->set('titolo','Logout');
        $f3->set('contenuto','logout.htm');
        echo \Template::instance()->render('templates/base.htm');
    }

    function LoginCheck($f3, $args) {
        // INIZIALIZZA SESSIONE
        $session = new \Session();

        if ($f3->VERB=='POST') {

            // CARICA I DATI INVIATI E DI SESSIONE
            $utente = $f3->get('POST.utente');
            $password = $f3->get('POST.password');
            $token = $f3->get('POST.token');
            $csrf = $f3->get('SESSION.csrf');

            // Resetta il csrf per evitare il doppio invio
            $f3->set('SESSION.csrf', $session->csrf());

            // CONTROLLA SE NON SONO SOTTO ATTACCO CSRF
            if ($token===$csrf) {
                echo "Check $utente $password<br>";
            } else {
                echo 'CSRF attack!<br>';
                die();
            }
        }
    }
}