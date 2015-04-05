<?php
namespace Soroush\Linkedin\Adapter;

/**
 * Class OAuth
 *
 * @package Soroush\Linkedin
 */
class OAuth
{
    protected $consumerKey;
    protected $consumerSecret;

    /**
     * @var \OAuth
     */
    protected $oauth;

    public function __construct($consumerKey, $consumerSecret)
    {
        $this->load($consumerKey, $consumerSecret);
        $this->oauth = new \OAuth($this->getConsumerKey(), $this->getConsumerSecret(), OAUTH_SIG_METHOD_HMACSHA1,
            OAUTH_AUTH_TYPE_AUTHORIZATION);
    }

    protected function load($consumerKey, $consumerSecret)
    {
        $this->setConsumerKey($consumerKey);
        $this->setConsumerSecret($consumerSecret);
    }

    /**
     * Set consumer key
     * @param string $consumerKey
     */
    public function setConsumerKey($consumerKey)
    {
        $this->consumerKey = $consumerKey;
    }

    /**
     * Get Consumer Key
     * @return string
     */
    public function getConsumerKey()
    {
        return $this->consumerKey;
    }

    /**
     * Set consumer secret
     *
     * @param string $consumerSecret
     */
    public function setConsumerSecret($consumerSecret)
    {
        $this->consumerSecret = $consumerSecret;
    }

    /**Get consumer secret
     *
     * @return string
     */
    public function getConsumerSecret()
    {
        return $this->consumerSecret;
    }

    /**
     * Get a request token
     *
     * @param $requestTokenUrl
     * @param string $callbackUrl The url which linkedin will call after user logs in
     * @return array Request token
     */
    public function getRequestToken($requestTokenUrl, $callbackUrl = null)
    {
        return $this->oauth->getRequestToken($requestTokenUrl, $callbackUrl);
    }

    /**Sets the token and secret
     *
     * @param string $token
     * @param string $tokenSecret
     */
    public function setToken($token, $tokenSecret)
    {
        $this->oauth->setToken($token, $tokenSecret);
    }

    /**
     * Gets the result from the url
     *
     * @param $url THe url to request
     * @return string|object|json|array
     */
    public function fetch($url)
    {
        try {
            $this->oauth->fetch($url);
            return $this->oauth->getLastResponse();
        } catch(\OAuthException $e) {
            echo $e->lastResponse;
        }
    }

    /**
     * Get the access token
     *
     * @param $url
     * @return array
     */
    public function getAccessToken($url)
    {
        return $this->oauth->getAccessToken($url);
    }

    /**
     * Gets the last response
     * @return array
     */
    public function getLastResponse()
    {
        return $this->oauth->getLastResponse();
    }


}