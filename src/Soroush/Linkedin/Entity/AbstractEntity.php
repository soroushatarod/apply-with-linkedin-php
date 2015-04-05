<?php

/**
 * Holds abstract methods that can be used
 * by any Entity
 *
 * @author Soroush Atarod <soroush.atarod@outlook.com>
 */
namespace Soroush\Linkedin\Entity;


class AbstractEntity
{

    /**
     * Gets the properties of the class
     *
     * @return array
     */
    public function getProperties()
    {
        $class = get_called_class();
        $reflection = new \ReflectionClass($class);
        $members = array_keys($reflection->getdefaultProperties());
        return $members;
    }


}