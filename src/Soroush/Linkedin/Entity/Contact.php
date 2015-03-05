<?php
/**
 * Created by PhpStorm.
 * User: karkton
 * Date: 02/03/2015
 * Time: 20:43
 */

namespace Soroush\Linkedin\Entity;


class Contact extends AbstractEntity
{
    /**
     * @var A collection of phone number objects.
     */
    public $phoneNumbers;

    /**
     * @var A collection of accounts bound by the member.
     */
    public $boundAccountTypes;

    /**
     * @var  collection of instant messenger accounts associated with the member
     */
    public $imAccounts;

    /**
     * @var The member's primary address.  We do not specify whether this is a work, home or other address.
     */
    public $mainAddress;

    /**
     * @var A collection of Twitter accounts associated with the member
     */
    public $twitterAccounts;

    /**
     * @var  The primary Twitter account associated with the member.
     */
    public $primaryTwitterAccount;


    public function setPhoneNumbers($phoneNumbers)
    {
        if ($phoneNumbers->_total != 0) {
            unset ($phoneNumbers->_total);
            $this->phoneNumbers = $phoneNumbers->values;
        }
    }

    public function getPhoneNumbers()
    {
        return $this->phoneNumbers;
    }

    public function setBoundAccountTypes($boundAccountTypes)
    {
        $this->boundAccountTypes = $boundAccountTypes;
    }

    public function getBoundAccountTypes()
    {
        return $this->boundAccountTypes;
    }

    public function setImAccounts($imAccounts)
    {
        if ($imAccounts->_total != 0) {
            unset ($imAccounts->_total);
            $this->imAccounts = $imAccounts->values;
        }
    }

    public function getImAccounts()
    {
        return $this->imAccounts;
    }

    public function setMainAddress($mainAddress)
    {
        $this->mainAddress = $mainAddress;
    }

    public function getMainAddress()
    {
        return $this->mainAddress;
    }

    public function setTwitterAccounts($twitterAccounts)
    {
        if ($twitterAccounts->_total != 0) {
            unset ($twitterAccounts->_total);
            $this->twitterAccounts = $twitterAccounts->values;
        }
    }

    public function getTwitterAccounts()
    {
        return $this->twitterAccounts;
    }

    public function setPrimaryTwitterAccount($primaryTwitterAccount)
    {
        $this->primaryTwitterAccount = $primaryTwitterAccount;
    }

    public function getPrimaryTwitterAccount()
    {
        return $this->primaryTwitterAccount;
    }


}