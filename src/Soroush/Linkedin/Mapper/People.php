<?php
/**
 *
 * Maps data from linkedin to the People entity
 *
 * @author Soroush Atarod <soroush_atarod@outlook.com>
 */

namespace Soroush\Linkedin\Mapper;


use Soroush\Linkedin\Mapper\Contact;

class People
{

    /**
     * @var \Soroush\Linkedin\Entity\People
     */
    protected $people;

    /**
     * @var array the people result from linkedin
     */
    protected $apiPeople;


    public function map($linkedinResult)
    {
        $this->apiPeople = json_decode($linkedinResult);
        $this->people = new \Soroush\Linkedin\Entity\People();
        $this->mapPeople();
        $this->mapPositions();
        $this->mapContacts();

        return $this->apiPeople;
    }


    public function mapPeople()
    {
        $this->people->setFirstName($this->apiPeople->firstName);
        $this->people->setlastName($this->apiPeople->lastName);
        $this->people->setFormattedName($this->apiPeople->formattedName);
        $this->people->setHeadline($this->apiPeople->headline);
        $this->people->setNumConnections($this->apiPeople->numConnections);
        $this->people->setPictureUrl($this->apiPeople->pictureUrl);
        $this->people->setLocation($this->apiPeople->location);
    }

    /**
     * Map the positions of the member
     */
    public function mapPositions()
    {
        if (isset($this->apiPeople->positions)) {
            $position = new Position();
            $position->map($this->apiPeople->positions);
            $this->people->setPositions($position->getMapData());
        }
    }

    public function mapContacts()
    {
        $contact = new Contact();
        $this->people->contact =  $contact->map($this->apiPeople);
    }


}