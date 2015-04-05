<?php
/*
 * Mapper for the Contact Entity
 * @author Soroush Atarod <soroush.atarod@outlook.com>
 */
namespace Soroush\Linkedin\Mapper;


use Soroush\Linkedin\Entity\AbstractEntity;
use Soroush\Linkedin\Utils\Field;

class Contact extends AbstractEntity
{

    /**
     * @var \Soroush\Linkedin\Entity\Contact
     */
    protected $contact;

    /**
     * @param $apiContacts
     * @return \Soroush\Linkedin\Entity\Contact
     */
    public function map($apiContacts)
    {
        $this->contact = new \Soroush\Linkedin\Entity\Contact();
        $fields = $this->contact->getProperties();
        Field::setNullIfFieldNotSet($apiContacts, $fields);
        $this->contact->setPhoneNumbers($apiContacts->phoneNumbers);
        $this->contact->setMainAddress($apiContacts->mainAddress);
        $this->contact->setImAccounts($apiContacts->imAccounts);
        $this->contact->setTwitterAccounts($apiContacts->twitterAccounts);
    }

    /**
     * Get the content details
     * @return \Soroush\Linkedin\Entity\Contact
     */
    public function getMapData()
    {
        return $this->contact;
    }
}