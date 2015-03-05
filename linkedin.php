<?php
/**
 * Created by PhpStorm.
 * User: karkton
 * Date: 21/02/2015
 * Time: 19:17
 */

require_once 'vendor/autoload.php';


$consumerKey =   '';
$consumerSecret = '';


$linkedin = new \Soroush\Linkedin\Linkedin($consumerKey, $consumerSecret);


$people = $linkedin->getPeople()->asPdf();


echo $people;
die();

//
//
//
//$oauth->setToken($_REQUEST['oauth_token'], $tokenSecret);
//$_SESSION['access_token'] = $oauth->getAccessToken($access_token_url);