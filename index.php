<?php

require_once 'vendor/autoload.php';


$consumerKey = '';
$consumerSecret = '';

$linkedin = new \Soroush\Linkedin\Linkedin($consumerKey, $consumerSecret);


if ($linkedin->isLoggedIn()) {
    echo $linkedin->fetch()->getProfile()->getFirstName();
} else {
    echo $linkedin->getLoginUrl();
}








