<?php
/**
 * Class which gets linkedin results
 *
 * @author Soroush Atarod <soroush_atarod@outlook.com>
 */
namespace Soroush\Linkedin;


use Soroush\Linkedin\Adapter\OAuth;
use Soroush\Linkedin\Entity\People;
use Soroush\Linkedin\Format\Format;
use Soroush\Linkedin\Format\Pdf;
use Soroush\Linkedin\Session\Session;

class Linkedin
{

    /**
     * @var string APP consumer KEY
     */
    protected $consumerKey;

    /**
     * @var string APP secret Key
     */

    protected $consumerSecret;
    protected $requestTokenUrl = 'https://api.linkedin.com/uas/oauth/requestToken';
    protected $loginOauthLoginUrl = 'https://api.linkedin.com/uas/oauth/authorize?oauth_token=';
    protected $accessTokenUrl = 'https://api.linkedin.com/uas/oauth/accessToken';

    protected $requestAccessToken;

    /**
     * @var Session
     */
    private $session;


    /**
     * @var OAuth
     */
    protected $oauth;

    /**
     * @var Token
     */
    protected $token;

    /**
     * @var Format
     */
    protected  $format;

    public function __construct($consumerKey, $consumerSecret)
    {
        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
        $this->format = new Format();
        $this->load();
    }

    /**
     * Load the Oauth Adapter
     */
    protected function load()
    {
        $this->oauth = new OAuth($this->consumerKey, $this->consumerSecret);
        $this->session = new Session();
        $this->token = new Token();
        $this->setTokens();

    }


    /**
     * Get the request token
     *
     * @param string $callbackUrl URL to be called back by linkedin
     * @return array
     */
    public function getRequestToken($callbackUrl = null)
    {
        $this->requestAccessToken = $this->oauth->getRequestToken($this->requestTokenUrl, $callbackUrl);
        $this->session->set('oauth_token_secret', $this->requestAccessToken['oauth_token_secret']);
        return $this->requestAccessToken;
    }


    /**
     * Get the login linkedin url
     *
     * @return string  The login url of linkedin app
     */
    public function getLoginUrl()
    {
        $requestAccessToken = $this->getRequestToken($this->requestTokenUrl);
        return $this->loginOauthLoginUrl . $requestAccessToken['oauth_token'];
    }


    /**
     * Sets the access token
     */
    protected function setTokens()
    {
        $this->token->setToken($this->session, $this->oauth, $this->accessTokenUrl);
    }

    /**
     * Gets the entire basic_profile of the member
     *
     * @return object People Profile from Linkedin
     */
    public function getPeople()
    {
        $people = new People();
        $request = new Request();
        $url = $request->getRequestUrl($people);
        $apiResult =  $this->oauth->fetch($url);
        $peopleMapper = new \Soroush\Linkedin\Mapper\People();
        $data = $peopleMapper->map($apiResult);
        $this->format->setData($data);
        return $this->format;

    }

    /**
     * Checks if a user is logged in or not
     *
     * @return bool
     */
    public function isLoggedIn()
    {
        $accessToken = $this->session->get('access_token');

        if (empty($accessToken)) {
            return false;
        }

        return true;
    }

    /**
     * Clear the tokens
     */
    public function clearToken()
    {
        $this->token->clearToken($this->session);
    }





}