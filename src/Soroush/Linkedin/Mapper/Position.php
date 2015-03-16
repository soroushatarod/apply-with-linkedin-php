<?php
/**
 * Created by PhpStorm.
 * User: karkton
 * Date: 01/03/2015
 * Time: 20:23
 */

namespace Soroush\Linkedin\Mapper;


use Soroush\Linkedin\Entity\Company;

class Position
{
    /**
     * @var \Soroush\Linkedin\Entity\Position
     */
    protected $positions = array();

    /**
     * @var array the positions result from linkedin
     */
    protected $apiPositions;

    public function map($linkedinResult)
    {
        $this->apiPositions = $linkedinResult;
        $this->mapPositions();
    }

    /**
     *  Maps the linkedin position to Position Entity
     */
    protected function mapPositions()
    {
        foreach ($this->apiPositions->values as $position) {


            $positionObj = new \Soroush\Linkedin\Entity\Position();

            $companyObj = new Company();

            if (isset($position->company->id)) {
                $companyObj->id = $position->company->id;
            }

            $companyObj->name = $position->company->name;
            $positionObj->company = $companyObj;

            $positionObj->isCurrent = $position->isCurrent;

            $positionObj->setStartDate($position->startDate);
            if (isset($position->endDate)) {
                $positionObj->calculateDurationOfEmployment($position->startDate, $position->endDate);
                $positionObj->calculateTotalExperienceInMonths($position->startDate, $position->endDate);
            } else {
                $dateNow = new \DateTime();
                $dateObj = new \stdClass();
                $dateObj->year = $dateNow->format('Y');
                $dateObj->month = $dateNow->format('m');
                $positionObj->calculateDurationOfEmployment($position->startDate, $dateObj);
                $positionObj->calculateTotalExperienceInMonths($position->startDate, $dateObj);
            }

            if (!$position->isCurrent) {
                $positionObj->setEndDate($position->endDate);
            }

            if (isset($position->summary)) {
                $positionObj->summary = $position->summary;
            }

            $positionObj->title = $position->title;
            $positions[] = $positionObj;
        }
        $this->positions = $positions;

    }

    /**
     *
     * @return array \Soroush\Linkedin\Entity\Position
     */
    public function getMapData()
    {
        return $this->positions;
    }

}