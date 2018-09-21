<?php
require 'vendor/autoload.php';
$f3 = \Base::instance();
$f3->set('DEBUG',3);
$f3->set('CACHE', true);

$f3->route('GET @home: /', '\App\App->Homepage');
$f3->route('GET @login: /login', '\App\Auth->Login');
$f3->route('POST @loginCheck: /loginCheck', '\App\Auth->LoginCheck');
$f3->route('GET @logout: /logout', '\App\Auth->Logout');
$f3->route('GET @autentica: /autentica', '\App\Auth->Autentica');
$f3->route('GET @utente: /utente', '\App\Admin->UtenteLista');
$f3->route('GET @utentenuovo: /utente/nuovo', '\App\Admin->UtenteNuovo');
$f3->route('POST @utenteregistra: /utente/registra', '\App\Admin->UtenteRegistra');

$f3->route('GET @verifica: /verifica', '\App\Admin->Verifica');

$f3->route('GET /test', '\App\Auth->Test');

$f3->run();
