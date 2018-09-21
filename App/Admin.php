<?php
namespace App;

class Admin
{
    public function beforeroute($f3)
    {
        $auth = \App\Auth::Autentica($f3);
        if (!$auth) {
            \App\Flash::instance()->addMessage('Prima effettuare il login', 'danger');
            $f3->reroute('/login');
            $f3->set('logged', false);
        } else {
            $f3->set('logged', true);
        }
    }

    public function Verifica($f3, $args)
    {
        $session = new \Session();
        //echo $session->ip();
        $f3->set('titolo', 'Verifica');
        $f3->set('contenuto', 'verifica.htm');
        echo \Template::instance()->render('templates/base.htm');
    }

    public function UtenteNuovo($f3, $args)
    {
        $f3->set('titolo', 'Utente');
        $f3->set('contenuto', 'utentenuovo.htm');
        echo \Template::instance()->render('templates/base.htm');
    }

    public function UtenteLista($f3, $args)
    {
        $db = new \DB\SQL('sqlite:.database.sqlite');
        $sql = "SELECT user_id from users";

        $f3->set('lista', $db->exec($sql));

        $f3->set('titolo', 'Utente');
        $f3->set('contenuto', 'utentelista.htm');
        echo \Template::instance()->render('templates/base.htm');
    }

    public function UtenteRegistra($f3, $args)
    {
        if ($f3->VERB == 'POST') {

            // CARICA I DATI INVIATI E DI SESSIONE
            $utente = $f3->get('POST.utente');
            $utente = str_replace(" ", "_", $utente);

            $password_hash = $f3->get('POST.p');

            $db = new \DB\SQL('sqlite:.database.sqlite');
            $db->begin();
            $sql = "INSERT INTO users VALUES('$utente', '$password_hash')";
            $db->exec($sql);
            $db->commit();

            $f3->reroute('/utente');
        }
    }

    public function UtenteCancella($f3, $args)
    {
        $utente = $f3->get('PARAMS.user_id');
        
        $db = new \DB\SQL('sqlite:.database.sqlite');
        $db->begin();
        $sql = "DELETE FROM users WHERE users.user_id = '$utente'";
        
        $db->exec($sql);
        $db->commit();

        $f3->reroute('/utente');
    }
}
