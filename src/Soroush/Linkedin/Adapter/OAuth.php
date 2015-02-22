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

    public function setConsumerKey($consumerKey)
    {
        $this->consumerKey = $consumerKey;
    }

    public function getConsumerKey()
    {
        return $this->consumerKey;
    }

    public function setConsumerSecret($consumerSecret)
    {
        $this->consumerSecret = $consumerSecret;
    }

    public function getConsumerSecret()
    {
        return $this->consumerSecret;
    }

    public function getRequestToken($requestTokenUrl, $callbackUrl = null)
    {
        return $this->oauth->getRequestToken($requestTokenUrl);
    }

    public function setToken($token, $tokenSecret)
    {
        $this->oauth->setToken($token, $tokenSecret);
    }

    public function fetch($url)
    {
        try {
            $this->oauth->fetch($url);
            return $this->oauth->getLastResponse();
        } catch(\OAuthException $e) {
            echo $e->lastResponse;
        }
    }

    public function getAccessToken($url)
    {
        return $this->oauth->getAccessToken($url);
    }

    public function getLastResponse()
    {
        return $this->oauth->getLastResponse();
    }


}