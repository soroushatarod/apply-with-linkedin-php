<?php
/**
 *
 * @author Soroush Atarod soroush_atarod@outlook.com
 */
namespace Soroush\Linkedin\Entity;

class Position extends AbstractEntity
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

    /**
     * @var string duration of employment at each company
     */
    public $durationOfEmployment;


    /**
     * @var string total experience in months
     */
    public static $totalExperienceInMonths;



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

    /**
     * Calculates duration of the employment period
     * @param $startDate object
     * @param $endDate   object
     */
    public function calculateDurationOfEmployment($startDate, $endDate)
    {
        $startDateFormatted = date_create(sprintf('%s-%s-01', $startDate->year, $startDate->month));
        $endDateFormatted = date_create(sprintf('%s-%s-01', $endDate->year, $endDate->month));
        $interval = $startDateFormatted->diff($endDateFormatted);

        if ($interval->y != 0 && $interval->m == 0) {
            $this->durationOfEmployment = sprintf('%s years', $interval->y);
        }

        if ($interval->y != 0 && $interval->m != 0) {
            $this->durationOfEmployment = sprintf('%s year and %s month', $interval->y, $interval->m);
        }

        if ($interval->y == 0) {
            $this->durationOfEmployment = sprintf('%s month', $interval->m);
        }

    }

    /**
     * Calculates the total experience in months
     *
     * @param $startDate    Start date of employment
     * @param $endDate      End date of employment
     */
    public function calculateTotalExperienceInMonths($startDate, $endDate)
    {
        $startDateFormatted = date_create(sprintf('%s-%s-01', $startDate->year, $startDate->month));
        $endDateFormatted = date_create(sprintf('%s-%s-01', $endDate->year, $endDate->month));
        $interval = $startDateFormatted->diff($endDateFormatted);
        self::$totalExperienceInMonths += $interval->format('%m');
    }

}