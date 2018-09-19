<?php
namespace App;
class Auth {
    function Login($f3, $args) {
        echo \Template::instance()->render('templates/login.htm');
    }

    function Logout($f3, $args) {
        $f3->set('titolo','Logout');
        $f3->set('contenuto','logout.htm');
        echo \Template::instance()->render('templates/base.htm');
    }

    function LoginCheck($f3, $args) {
        $utente = $f3->get('POST.utente');
        $password = $f3->get('POST.password');
        echo "Check $utente $password<br>";
        
        
    }

    function LoginToken($f3, $args) {

        $session = new \Session();
        $csrf = $session->csrf();
        
        $f3->set('SESSION.csrf', $csrf);
        $f3->reroute('/loginTokenVerify/?token='.$csrf);
    }

    function LoginTokenVerify($f3, $args) {
        $session = new \Session();

        if ($f3->VERB=='GET') {

            $token = $f3->get('GET.token');
            $csrf = $f3->get('SESSION.csrf');

            if ($token===$csrf) {
                echo 'CSRF OK!<br>';
                echo 'token: '.$token.'<br>';
                echo 'csrf_: '.$csrf.'<br>';
            } else {
                echo 'CSRF attack!<br>';
                echo 'token: '.$token.'<br>';
                echo 'csrf_: '.$csrf.'<br>';
            }
        }
    }
}