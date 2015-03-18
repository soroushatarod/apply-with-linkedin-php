<?php

require_once 'vendor/autoload.php';


$consumerKey =   '';
$consumerSecret = '';


$linkedin = new \Soroush\Linkedin\Linkedin($consumerKey, $consumerSecret);

$linkedin->getApplication()->asPdf('pdfs/linkedin-application.pdf');
