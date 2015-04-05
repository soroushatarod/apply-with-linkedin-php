<?php
/**
 *
 * Holds util methods that can be used
 * by any class. All methods here should be static
 *
 * Soroush Atarod <soroush.atarod@outlook.com>
 */

namespace Soroush\Linkedin\Utils;


class Field
{

    /**
     *  Sets the field null if its not set
     *
     * @param $source    The data source to check if the field exists or not
     * @param array $fields The fields to check if set or not
     */
    public static function setNullIfFieldNotSet($source, array $fields)
    {
        foreach ($fields as $id => $name) {
            if (!isset($source->$name)) {
                $source->$name = null;
            }
        }
    }
}