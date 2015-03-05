<?php

require_once 'vendor/autoload.php';


$consumerKey =  '';
$consumerSecret = '';

$linkedin = new \Soroush\Linkedin\Linkedin($consumerKey, $consumerSecret);


$linkedin->clearToken();

if ($linkedin->isLoggedIn()) {
    $people = $linkedin->getPeople();
    echo $people;
} else {
    echo $linkedin->getLoginUrl();
}








