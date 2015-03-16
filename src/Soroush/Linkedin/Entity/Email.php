<?php
/**
 * Created by PhpStorm.
 * User: karkton
 * Date: 07/03/2015
 * Time: 18:23
 */

namespace Soroush\Linkedin\Entity;


class Email
{
    public $emailAddress;

    public function setEmail($email)
    {
        $this->emailAddress = $email;
    }

    public function getEmail()
    {
        return $this->emailAddress;
    }
}