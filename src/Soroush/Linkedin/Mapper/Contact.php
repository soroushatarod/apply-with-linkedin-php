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

    /**
     * @param $apiContacts
     * @return \Soroush\Linkedin\Entity\Contact
     */
    public function map($apiContacts)
    {
        $contact = new \Soroush\Linkedin\Entity\Contact();
        $this->checkIfFieldIsSet($apiContacts);
        $contact->setPhoneNumbers($apiContacts->phoneNumbers);
        $contact->setMainAddress($apiContacts->mainAddress);
        $contact->setImAccounts($apiContacts->imAccounts);
        $contact->setTwitterAccounts($apiContacts->twitterAccounts);

        return $contact;
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
}