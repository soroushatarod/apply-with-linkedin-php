<?php

/**
 * Location fields
 *
 * @see https://developer.linkedin.com/docs/fields/location
 * @author Soroush Atarod <soroush_atarod@outlook.com>
 */

namespace Soroush\Linkedin\Entity;


class Location
{

    /**
     * @var string Generic name representing the location of the
     *              member
     */
    public $name;

    /**
     * @var string Lower case ISO 3166-1 alpha-2 standard country code
     *             representing the member's current country.
     */
    public $countryCode;
}