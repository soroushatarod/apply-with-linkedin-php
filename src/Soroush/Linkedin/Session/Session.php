<?php
/**
 *
 * A simple session class
 *
 * @author Soroush Atarod soroush.atarod@outlook.com
 */

namespace Soroush\Linkedin\Session;


class Session
{

    /**
     * Unique session key of our package
     * which is appended to every session
     * the package uses to avoid conflict with out
     * session
     *
     * @var string
     */
    private $key = 'soroush_session';

    /**
     * THe session keys which the package use
     *
     * @var array
     */
    private $linkedinKeys = array(
        'oauth_token_secret',
        'access_token',
        'oauth_verified'
    );

    public function __construct()
    {
        if (!session_id()) {
            session_start();
        }
    }

    /**
     * Get the session key
     * KEY is unique to our package to avoid
     * session conflict
     * @return string
     */
    protected function getKey()
    {
        return $this->key;
    }

    /**
     * Sets a session
     *
     * @param $key  Session KEY
     * @param $value Value to save
     */
    public function set($key, $value)
    {
        $key = $this->getKey() . $key;
        $_SESSION[$key] = $value;
    }

    /**
     * Get the session value based upon the key
     *
     * @param $key The key to get
     * @param $default  Value to return if Key not found
     *
     * @return bool|string| array
     */
    public function get($key, $default = null)
    {
        $key = $this->getKey() . $key;

        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        if (isset($default)) {
            return $default;
        }

        return false;
    }

    /**
     * Clear the session tokens
     */
    public function clear()
    {
        foreach ($this->linkedinKeys as $sessionKey) {
            $key = $this->getKey() . $sessionKey;
            if (isset($_SESSION[$key])) {
                unset ($_SESSION[$key]);
            }
        }
    }

}