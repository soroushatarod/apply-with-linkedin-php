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


    /**
     * Generate query string to get all the fields
     *
     * @param $entity
     * @return string
     */
    protected function allFields($entity)
    {
        $entityNameSpace = 'Soroush\Linkedin\Entity\\';
        $entitiesAvailable = array('People', 'Contact', 'Email');
        $fieldUrl = null;
        $count = 0;
        foreach ($entitiesAvailable as $e) {
            $count++;
            $str  = $entityNameSpace .$e;
            $members = get_class_vars($str);
            $fieldUrl .= implode(',', array_keys($members));
            $fieldUrl .= ',';
        }
        $fieldUrl = rtrim($fieldUrl, ",");
        return sprintf($this->linkedinApiUrl, $fieldUrl);
    }
}