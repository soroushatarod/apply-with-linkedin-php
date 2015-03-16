<?php
/**
 * Created by PhpStorm.
 * User: karkton
 * Date: 22/02/2015
 * Time: 14:48
 */

namespace Soroush\Linkedin\Entity;


class AbstractEntity
{

    public function getFields()
    {
        $class = get_called_class();
        $members = get_class_vars($class);
        return $members;
    }


}