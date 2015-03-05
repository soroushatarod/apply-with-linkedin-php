<?php
/**
 *
 * @author Soroush Atarod soroush_atarod@outlook.com
 */
namespace Soroush\Linkedin\Entity;

class Position extends  AbstractEntity implements \Countable
{
    /**
     * The company id
     * @var int
     */
    public $id;

    /**Title of the job
     *
     * @var string
     */
    public $title;


    /**
     * Company which member worked or working
     * @var object
     */
    public $company;


    /**
     * TRUE member is working at this company, FALSE if not
     * @var bool
     */
    public $isCurrent;

    /**
     * @var \DateInterval
     */
    public $startDate;

    /**
     * @var \DateInterval
     */
    public $endDate;

    /**
     * Summary of the job
     * @var string
     */
    public $summary;


    public function count()
    {

    }

    public function setStartDate($startDate)
    {
        $this->setDate($startDate, 'startDate');
    }


    public function setEndDate($endDate)
    {
        $this->setDate($endDate, 'endDate');
    }

    protected function setDate($date, $type)
    {
        $strDate = sprintf('%s-%s-01', $date->year, $date->month);
        $timestamp = strtotime($strDate);

        $month = date("F", $timestamp);
        $year = date("Y", $timestamp);

        $this->$type = $month . '-' . $year;
    }

}