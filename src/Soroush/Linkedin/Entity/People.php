<?php
/**
 *
 * @author Soroush Atarod soroush_atarod@outlook.com
 */
namespace Soroush\Linkedin\Entity;


class People extends AbstractEntity {

    /**
     * @var string Users first name
     */
    public $firstName;

    /**
     * @var string Users last name
     */
    public $lastName;

    /**
     * @var string Users maiden name
     */
    public $maidenName;

    /**
     * @var string Users name, formatted based on language
     */
    public $formattedName;

    /**
     * @var string Users first name, spelled phonetically.
     */
    public $phoneticFirstName;

    /**
     * @var string Users last name, spelled phonetically.
     */
    public $phoneticLastName;

    /**
     * @var string Users headline
     */
    public $headline;

    /**
     * @var object Users physical location
     */
    public $location;

    /**
     * @var object Industry the user belongs to
     */
    public $industry;

    /**
     * @var object Most recent item  user has shared on Linkedin
     */
    public $currentShare;


    /**
     * @var int number of linkedin connection the user has
     */
    public $numConnections;


    /**
     * @var boolean
     */
    public $numConnectionsCapped;

    /**
     * @var string long form text area
     */
    public $summary;


    /**
     * @var string Short form text area describing member's specialties
     */
    public $specialties;


    /**
     * @var object User's current and past positions
     */
    public $positions;

    /**
     * @var string URL to the user's formatted profile picture, if one has been provided
     */
    public $pictureUrl;

    /**
     * @var string URL to the user's original unformatted profile picture;
     */
    public $pictureUrls;

    /**
     * @var string URL to the user's authenticated profile on Linkedin
     */
    public $siteStandardProfileRequest;

    public function setPositions($positions)
    {
        $this->positions = $positions;
    }

    public function getPositions()
    {
        return $this->positions;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }


    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getLastName()
    {
       return $this->lastName;

    }

    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    public function getSummary()
    {
        return $this->summary;
    }


    public function setMaidenName($maidenName)
    {
        $this->maidenName = $maidenName;
    }

    public function getMaidenName()
    {
        return $this->maidenName;
    }

    public function setHeadline($headline)
    {
        $this->headline = $headline;
    }

    public function getHeadline()
    {
        return $this->headline;
    }

    public function setPictureUrl($pictureUrl)
    {
        $this->pictureUrl = $pictureUrl;
    }

    public function getPictureUrl()
    {
        return $this->pictureUrl;
    }

    public function setSiteStandardProfileRequest($siteStandardProfileRequest)
    {
        $this->siteStandardProfileRequest = $siteStandardProfileRequest;
    }

    public function getSiteStandardProfileRequest()
    {
        return $this->siteStandardProfileRequest;
    }


    public function setLocation($location)
    {
        $this->location  = $location->name;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setFormattedName($formattedName)
    {
        $this->formattedName = $formattedName;
    }

    public function getFormattedName()
    {
        return $this->formattedName;
    }

    public function setNumConnections($numConnections)
    {
        $this->numConnections = $numConnections;
    }

    public function getNumConnections()
    {
        return $this->numConnections;
    }


}