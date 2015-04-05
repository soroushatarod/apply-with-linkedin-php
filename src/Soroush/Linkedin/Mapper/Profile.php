<?php
/**
 *
 * Maps data from linkedin to the profile entity
 *
 * @author Soroush Atarod <soroush_atarod@outlook.com>
 */

namespace Soroush\Linkedin\Mapper;


use Soroush\Linkedin\Entity\AbstractEntity;
use Soroush\Linkedin\Mapper\Email;
use Soroush\Linkedin\Mapper\Contact;
use Soroush\Linkedin\Utils\Field;

class profile extends AbstractEntity
{

    /**
     * @var \Soroush\Linkedin\Entity\Profile
     */
    protected $profile;

    /**
     * @var array the profile result from linkedin
     */
    protected $linkedinData;


    /**
     * Maps the linkedin data to the entities
     *
     * @param $linkedinResult The returned data from linkedin
     *
     * @return \Soroush\Linkedin\Entity\Profile
     */
    public function map($linkedinResult)
    {
        $this->linkedinData = json_decode($linkedinResult);
        $this->profile = new \Soroush\Linkedin\Entity\Profile();
        $this->mapProfile();
        $this->mapPositions();
        $this->mapContacts();
        return $this->profile;
    }


    public function mapProfile()
    {
        $fields = $this->profile->getProperties();
        Field::setNullIfFieldNotSet($this->linkedinData, $fields);
        $this->profile->setFirstName($this->linkedinData->firstName);
        $this->profile->setlastName($this->linkedinData->lastName);
        $this->profile->setFormattedName($this->linkedinData->formattedName);
        $this->profile->setHeadline($this->linkedinData->headline);
        $this->profile->setPublicProfileUrl($this->linkedinData->publicProfileUrl);
        $this->profile->setEmailAddress($this->linkedinData->emailAddress);
        $this->profile->setNumConnections($this->linkedinData->numConnections);
        $this->profile->setPictureUrl($this->linkedinData->pictureUrl);
        $this->profile->setLocation($this->linkedinData->location);
        $this->profile->setSummary($this->linkedinData->summary);
        $this->profile->setSkills($this->linkedinData->skills);
    }

    /**
     * Map the positions of the member
     */
    public function mapPositions()
    {
        if (isset($this->linkedinData->positions)) {
            $position = new Position();
            $position->map($this->linkedinData->positions);
            $this->profile->setPositions($position->getMapData());
        }
    }

    public function mapContacts()
    {
        $contact = new Contact();
        $contact->map($this->linkedinData);
        $this->profile->contact = $contact->getMapData();
    }

}