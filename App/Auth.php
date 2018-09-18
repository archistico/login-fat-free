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
        echo "Check $utente $password";
    }
}