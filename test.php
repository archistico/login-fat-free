<?php
require 'vendor/autoload.php';
$f3 = \Base::instance();

//$f3=require(__DIR__.'/lib/base.php'); // path to f3

// Set up
$test=new Test;
include('App/Hello.php');

// This is where the tests begin
$test->expect(
    is_callable('hello'),
    'hello() is a function'
);

// Another test
$hello=hello();
$test->expect(
    !empty($hello),
    'Something was returned'
);

// This test should succeed
$test->expect(
    is_string($hello),
    'Return value is a string'
);

// This test is bound to fail
$test->expect(
    strlen($hello)==12,
    'String length is 12'
);

// Display the results; not MVC but let's keep it simple
foreach ($test->results() as $result) {
    echo $result['text'].'<br>';
    if ($result['status'])
        echo '<strong>Pass</strong><hr/>';
    else
        echo 'Fail ('.$result['source'].')';
    echo '<br>';
}