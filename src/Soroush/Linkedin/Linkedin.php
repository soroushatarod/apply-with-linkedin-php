<?php
/**
 * Class which gets linkedin results
 *
 * @author Soroush Atarod <soroush_atarod@outlook.com>
 */
namespace Soroush\Linkedin;


use Soroush\Linkedin\Adapter\OAuth;
use Soroush\Linkedin\Entity\People;
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

    public function __construct($consumerKey, $consumerSecret)
    {
        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
        $this->load();
    }

    /**
     * Load the Oauth Adapter
     */
    protected function load()
    {
        $this->oauth = new OAuth($this->consumerKey, $this->consumerSecret);
        $this->session = new Session();
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
        $accessToken = $this->session->get('access_token');

        if (empty($accessToken) && !empty($_REQUEST['oauth_token'])) {

            $tokenSecret = $this->session->get('oauth_token_secret');
            $this->oauth->setToken($_REQUEST['oauth_token'], $tokenSecret);

            $this->session->set('access_token', $this->oauth->getAccessToken($this->accessTokenUrl));
            $this->session->set('oauth_verified', $_REQUEST['oauth_verifier']);

        }

        if (($this->session->get('access_token') != false)) {
            $accessToken = $this->session->get('access_token');
            $this->oauth->setToken($accessToken['oauth_token'], $accessToken['oauth_token_secret']);
        }

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
        return $this->oauth->fetch($url);
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
        $this->session->clear();
    }




}