<?php
/**
 * Created by PhpStorm.
 * User: karkton
 * Date: 07/03/2015
 * Time: 18:33
 */

namespace Soroush\Linkedin\Mapper;


class Email
{
    /**
     * @var string Members email
     * s
     */
    protected  $email;
    protected $linkedinData;

    public function map($linkedinApiData)
    {
        $this->linkedinData = $linkedinApiData;
        $this->mapEmail();
    }

    public function mapEmail()
    {
        $this->email = new \Soroush\Linkedin\Entity\Email();
        if (isset($this->linkedinData->emailAddress)) {

            $this->email->setEmail($this->linkedinData->emailAddress);
        }

    }

    public function getMapData()
    {
        return $this->email;
    }
}