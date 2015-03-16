<?php
/**
 * Created by PhpStorm.
 * User: karkton
 * Date: 07/03/2015
 * Time: 20:37
 */

namespace Soroush\Linkedin\Strategy;


class Field
{

    public static function isNullOrEmpty($field, array $matches)
    {
        foreach ($matches as $x => $y) {
            if (!isset($field->$x)) {
                $field->$x = 'N/A';
            }
        }
    }
}