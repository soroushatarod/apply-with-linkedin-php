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

    public function fieldGenerator($fields = 'all')
    {
        switch ($fields) {
            case 'all':
                $this->allFields();
                break;
        }
    }

    protected function allFields()
    {
        $class = get_called_class();
        $members = get_class_vars($class);


        $fieldUrl = implode(',', array_keys($members));

        var_dump($fieldUrl);
        die();

    }

    protected function setNull()
    {



    }
}