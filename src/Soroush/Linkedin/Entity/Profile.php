<?php
/**
 *
 * @author Soroush Atarod soroush_atarod@outlook.com
 */
namespace Soroush\Linkedin\Entity;


class Profile extends AbstractEntity
{

    /**
     * @var string Users first name
     */
    protected $firstName;

    /**
     * @var string Users last name
     */
    protected $lastName;

    /**
     * @var string Users maiden name
     */
    protected $maidenName;

    /**
     * @var string Users name, formatted based on language
     */
    protected $formattedName;

    /**
     * @var string Users first name, spelled phonetically.
     */
    protected $phoneticFirstName;

    /**
     * @var string Users last name, spelled phonetically.
     */
    protected $phoneticLastName;

    /**
     * @var string Users headline
     */
    protected $headline;

    /**
     * @var object Users physical location
     */
    protected $location;

    /**
     * @var object Industry the user belongs to
     */
    protected $industry;

    /**
     * @var object Most recent item  user has shared on Linkedin
     */
    protected $currentShare;


    /**
     * @var int number of linkedin connection the user has
     */
    protected $numConnections;


    /**
     * @var boolean
     */
    protected $numConnectionsCapped;

    /**
     * @var string long form text area
     */
    protected $summary;


    /**
     * @var string Short form text area describing member's specialties
     */
    protected $specialties;


    /**
     * @var  Position
     */
    protected $positions;

    /**
     * @var string URL to the user's formatted profile picture, if one has been provided
     */
    protected $pictureUrl;

    /**
     * @var string URL to the user's original unformatted profile picture;
     */
    protected $pictureUrls;

    /**
     * @var string URL to the user's authenticated profile on Linkedin
     */
    protected $siteStandardProfileRequest;

    /**
     * @var array List of members skills
     */
    protected $skills;

    /**
     * @var string Members e-mail address
     */
    protected $emailAddress;

    /**
     * @var string Members public profile URL
     */
    protected $publicProfileUrl;


    /**
     * @var array Members three past position
     */
    protected $threePastPositions;


    /**
     * Sets the members public linkedin profile URL
     *
     * @param $url string Members public url
     */
    public function setPublicProfileUrl($url)
    {
        $this->publicProfileUrl = $url;
    }

    public function getPublicProfileUrl()
    {
        return $this->publicProfileUrl;
    }

    /**
     * Set the three Past position of the member
     * @param $threePastPosition
     */
    public function setThreePastPositions($threePastPosition)
    {
        $this->threePastPositions = $threePastPosition;
    }

    /**
     * Get the three past position of the member
     * @return array
     */
    public function getThreePastPositions()
    {
        return $this->threePastPositions;
    }

    /**
     * @param $positions
     */
    public function setPositions($positions)
    {
        $this->positions = $positions;
    }


    /**
     * @return Position
     */
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
        $this->location = $location->name;
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


    public function setSkills($skills)
    {
        if (! $skills) {
            return false;
        }

        unset($skills->_total);
        $tmp = array();

        foreach ($skills->values as $skill) {
                $tmp[] = $skill->skill->name;
        }

        natcasesort($tmp);
        $this->skills = $tmp;
    }

    public function getSkills()
    {
        return $this->skills;
    }

    public function setEmailAddress($email)
    {
        $this->emailAddress = $email;
    }

    public function getEmailAddress()
    {
        return $this->emailAddress;
    }


}