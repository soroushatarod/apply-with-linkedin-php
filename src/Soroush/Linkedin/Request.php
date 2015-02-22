<?php
/**
 * Created by PhpStorm.
 * User: karkton
 * Date: 22/02/2015
 * Time: 15:51
 */

namespace Soroush\Linkedin;


class Request
{

    protected $linkedinApiUrl = 'https://api.linkedin.com/v1/people/~:(%s)?format=json';

    public function getRequestUrl($entity, $fields = 'all')
    {
        $url  = '';
        switch ($fields) {
            case 'all':
                $url = $this->allFields($entity);
                break;
        }

        return $url;
    }


    protected function allFields($entity)
    {
        $class = get_class($entity);
        $members = get_class_vars($class);
        $fieldUrl = implode(',', array_keys($members));
        return sprintf($this->linkedinApiUrl, $fieldUrl);
    }
}