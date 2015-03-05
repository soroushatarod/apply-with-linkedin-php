<?php

/**
 * This class handles the token
 * @author Soroush Atarod <soroush_atarod@outlook.com>
 */
namespace Soroush\Linkedin;


use Soroush\Linkedin\Adapter\OAuth;
use Soroush\Linkedin\Session\Session;

class Token
{
    /**
     *
     * Sets the token in the session
     *
     * @param Soroush\Linkedin\Session\Session $session
     * @param Soroush\Linkedin\Adapter\OAut $oauth
     */
    public function setToken(Session $session, OAuth $oauth, $accessTokenUrl)
    {
        $accessToken = $session->get('access_token');

        if (empty($accessToken) && !empty($_REQUEST['oauth_token'])) {

            $tokenSecret = $session->get('oauth_token_secret');
            $oauth->setToken($_REQUEST['oauth_token'], $tokenSecret);

            $session->set('access_token', $oauth->getAccessToken($accessTokenUrl));
            $session->set('oauth_verified', $_REQUEST['oauth_verifier']);

        }

        if (($session->get('access_token') != false)) {
            $accessToken = $session->get('access_token');
            $oauth->setToken($accessToken['oauth_token'], $accessToken['oauth_token_secret']);
        }

    }

    /**
     * Clears the token
     * @param Session $session
     */
    public function clearToken(Session $session)
    {
        $session->clear();
    }
}