<?php

/**
 * Created by PhpStorm.
 * User: karkton
 * Date: 22/02/2015
 * Time: 18:47
 */
class SessionTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        ob_start();
    }


    public function testSessionSet()
    {
        $session = new \Soroush\Linkedin\Session\Session();
        $session->set('hello', 'water');
        $contains = $session->get('hello');
        $this->assertContains('water', $contains);
    }
}