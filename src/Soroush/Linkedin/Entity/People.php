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


    public function getSummary()
    {
        return $this;
    }

    public function getFirstName()
    {
        return $this;
    }



}