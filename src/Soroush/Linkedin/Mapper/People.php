<?php
/**
 *
 * Maps data from linkedin to the People entity
 *
 * @author Soroush Atarod <soroush_atarod@outlook.com>
 */

namespace Soroush\Linkedin\Mapper;


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


    public function __construct(\Soroush\Linkedin\Entity\People $people)
    {
        $this->people = $people;
    }

    public function map($apiPeople)
    {
        $this->apiPeople = $apiPeople;
        $this->loadPeople();
    }


    protected function loadPeople()
    {

        $this->people->firstName = $this->apiPeople->first_name;
        $this->people->lastName  = $this->apiPeople->last_name;
    }

}