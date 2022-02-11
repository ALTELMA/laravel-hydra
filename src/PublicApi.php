<?php

namespace Altelma\LaravelHydra;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class PublicApi
{
    private string $baseUrl;
    private Client $client;

    public function __construct()
    {
        $this->baseUrl = config('hydra.public_api_url');
        $this->client = new Client();
    }

    /**
     * JSON Web Keys Discovery
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function wellKnown(): object
    {
        $response = $this->client->get($this->baseUrl . '/.well-known/jwks.json');

        return json_decode($response->getBody());
    }

    /**
     * OpenID Connect Discovery
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function discoverOpenIDConfiguration(): object
    {
        $response = $this->client->get($this->baseUrl . '/.well-known/openid-configuration');

        return json_decode($response->getBody());
    }

    /**
     * Check Readiness Status
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function isInstanceReady(): object
    {
        $response = $this->client->get($this->baseUrl . '/health/ready');

        return json_decode($response->getBody());
    }

    /**
     * The OAuth 2.0 Token Endpoint
     *
     * @param array $params
     * @return object
     *
     * @throws GuzzleException
     */
    public function oauth2Token(array $params): object {
        $response = $this->client->post(
            $this->baseUrl . '/oauth2/token', [
                'form_params' => $params
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Revoke OAuth2 Tokens
     *
     * @param string $token
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function revokeOAuth2Token(string $token): object
    {
        $response = $this->client->post(
            $this->baseUrl . '/oauth2/revoke', [
                'form_params' => [
                    'token' => $token
                ]
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * OpenID Connect Userinfo
     *
     * @param string $token
     * @return object
     *
     * @throws GuzzleException
     */
    public function userinfo(string $token): object
    {
        $response = $this->client->get(
            $this->baseUrl . '/userinfo', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]
        );

        return json_decode($response->getBody());
    }
}
