<?php
/**
 * Created by PhpStorm.
 * User: karkton
 * Date: 02/03/2015
 * Time: 21:16
 */

namespace Soroush\Linkedin\Mapper;


class Contact
{

    protected $contact;

    /**
     * @param $apiContacts
     * @return \Soroush\Linkedin\Entity\Contact
     */
    public function map($apiContacts)
    {
        $this->contact = new \Soroush\Linkedin\Entity\Contact();
        $this->checkIfFieldIsSet($apiContacts);
        $this->contact->setPhoneNumbers($apiContacts->phoneNumbers);
        $this->contact->setMainAddress($apiContacts->mainAddress);
        $this->contact->setImAccounts($apiContacts->imAccounts);
        $this->contact->setTwitterAccounts($apiContacts->twitterAccounts);
    }

    protected function checkIfFieldIsSet($apiContact)
    {
        $classVar = get_class_vars("\Soroush\Linkedin\Entity\Contact");

        foreach ($classVar as $member => $value) {
            if (!isset($apiContact->$member)) {
                $apiContact->$member = 'N/A';
            }
        }
    }

    public function getMapData()
    {
        return $this->contact;
    }
}