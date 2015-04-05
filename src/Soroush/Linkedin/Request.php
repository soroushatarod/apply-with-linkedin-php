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
        $entitiesAvailable = array('Profile', 'Contact');
        $fieldUrl = null;
        $count = 0;
        foreach ($entitiesAvailable as $e) {
            $count++;
            $class  = $entityNameSpace .$e;
            $reflection = new \ReflectionClass($class);
            $properties = array_keys($reflection->getdefaultProperties());
            $fieldUrl .= implode(',', array_values($properties));
            $fieldUrl .= ',';
        }
        $fieldUrl = rtrim($fieldUrl, ",");
        return sprintf($this->linkedinApiUrl, $fieldUrl);
    }
}