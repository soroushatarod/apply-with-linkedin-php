<?php
/**
 *
 * Maps data from linkedin to the People entity
 *
 * @author Soroush Atarod <soroush_atarod@outlook.com>
 */

namespace Soroush\Linkedin\Mapper;


use Soroush\Linkedin\Entity\AbstractEntity;
use Soroush\Linkedin\Mapper\Email;
use Soroush\Linkedin\Mapper\Contact;
use Soroush\Linkedin\Strategy\Field;

class People extends AbstractEntity
{

    /**
     * @var \Soroush\Linkedin\Entity\People
     */
    protected $people;

    /**
     * @var array the people result from linkedin
     */
    protected $linkedinData;


    public function map($linkedinResult)
    {
        $this->linkedinData = json_decode($linkedinResult);
        $this->people = new \Soroush\Linkedin\Entity\People();
        $this->mapPeople();
        $this->mapPositions();
        $this->mapContacts();
        $this->mapEmail();
        return $this->people;
    }


    public function mapPeople()
    {
        $fields = $this->people->getFields();
        Field::isNullOrEmpty($this->linkedinData, $fields);
        $this->people->setFirstName($this->linkedinData->firstName);
        $this->people->setlastName($this->linkedinData->lastName);
        $this->people->setFormattedName($this->linkedinData->formattedName);
        $this->people->setHeadline($this->linkedinData->headline);
        $this->people->setNumConnections($this->linkedinData->numConnections);
        $this->people->setPictureUrl($this->linkedinData->pictureUrl);
        $this->people->setLocation($this->linkedinData->location);
        $this->people->setSummary($this->linkedinData->summary);
        $this->people->setSkills($this->linkedinData->skills);
    }

    /**
     * Map the positions of the member
     */
    public function mapPositions()
    {
        if (isset($this->linkedinData->positions)) {
            $position = new Position();
            $position->map($this->linkedinData->positions);
            $this->people->setPositions($position->getMapData());
        }
    }

    public function mapContacts()
    {
        $contact = new Contact();
        $contact->map($this->linkedinData);
        $this->people->contact = $contact->getMapData();
    }

    public function mapEmail()
    {
        $email = new Email();
        $email->map($this->linkedinData);
        $this->people->email = $email->getMapData();
    }


}