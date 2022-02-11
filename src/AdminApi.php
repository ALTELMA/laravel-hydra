<?php

namespace Altelma\LaravelHydra;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class AdminApi
{
    private string $baseUrl;
    private Client $client;

    public function __construct()
    {
        $this->baseUrl = config('hydra.admin_api_url');
        $this->client = new Client();
    }

    /**
     * List OAuth 2.0 Clients
     *
     * @return array
     *
     * @throws GuzzleException
     */
    public function listOAuth2Clients(): array
    {
        $response = $this->client->get($this->baseUrl . '/clients');

        return json_decode($response->getBody());
    }

    /**
     * Create an OAuth 2.0 Client
     *
     * @param array $params
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function createOAuth2Client(array $params): object
    {
        $response = $this->client->post(
            $this->baseUrl . '/clients', [
                'json' => $params,
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Get an OAuth 2.0 Client.
     *
     * @param string $clientId
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function getOAuth2Client(string $clientId): object
    {
        $response = $this->client->get($this->baseUrl . '/clients/' . $clientId);

        return json_decode($response->getBody());
    }

    /**
     * Update an OAuth 2.0 Client
     *
     * @param string $clientId
     * @param array $params
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function updateOAuth2Client(string $clientId, array $params): object
    {
        $response = $this->client->put(
            $this->baseUrl . '/clients/' . $clientId, [
                'json' => $params,
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Patch an OAuth 2.0 Client
     *
     * @param string $clientId
     * @param array $params
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function patchOAuth2Client(string $clientId, array $params): object
    {
        $response = $this->client->patch(
            $this->baseUrl . '/clients/' . $clientId, [
                'json' => [
                    [
                        'from' => $params['from'],
                        'op' => 'replace',
                        'path' => '/',
                        'value' => $params['value'],
                    ],
                ],
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Deletes an OAuth 2.0 Client
     *
     * @param string $clientId
     *
     * @throws GuzzleException
     */
    public function deleteOAuth2Client(string $clientId)
    {
        $this->client->delete($this->baseUrl . '/clients/' . $clientId);
    }

    /**
     * Get a Login Request
     *
     * @param string $loginChallenge
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function getLoginRequest(string $loginChallenge): object
    {
        $response = $this->client->get(
            $this->baseUrl . '/oauth2/auth/requests/login', [
                'query' => [
                    'login_challenge' => $loginChallenge,
                ]
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Accept a Login Request
     *
     * @param string $loginChallenge
     * @param array $params
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function acceptLoginRequest(string $loginChallenge, array $params): object
    {
        $response = $this->client->put(
            $this->baseUrl . '/oauth2/auth/requests/login/accept', [
                'query' => [
                    'login_challenge' => $loginChallenge,
                ],
                'json' => $params,
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Reject a Login Request
     *
     * @param string $loginChallenge
     * @param array $params
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function rejectLoginRequest(string $loginChallenge, array $params): object
    {
        $response = $this->client->put(
            $this->baseUrl . '/oauth2/auth/requests/login/reject', [
                'query' => [
                    'login_challenge' => $loginChallenge,
                ],
                'json' => $params,
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Get Consent Request Information
     *
     * @param string $consentChallenge
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function getConsentRequest(string $consentChallenge): object
    {
        $response = $this->client->get(
            $this->baseUrl . '/oauth2/auth/requests/consent', [
                'query' => [
                    'consent_challenge' => $consentChallenge,
                ]
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Accept a Consent Request
     *
     * @param string $consentChallenge
     * @param array $params
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function acceptConsentRequest(string $consentChallenge, array $params): object
    {
        $response = $this->client->put(
            $this->baseUrl . '/oauth2/auth/requests/consent/accept', [
                'query' => [
                    'consent_challenge' => $consentChallenge,
                ],
                'json' => $params,
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Reject a Consent Request
     *
     * @param string $consentChallenge
     * @param array $params
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function rejectConsentRequest(string $consentChallenge, array $params): object
    {
        $response = $this->client->put(
            $this->baseUrl . '/oauth2/auth/requests/consent/reject', [
                'query' => [
                    'consent_challenge' => $consentChallenge,
                ],
                'json' => $params,
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Get a Logout Request
     *
     * @param string $logoutChallenge
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function getLogoutRequest(string $logoutChallenge): object
    {
        $response = $this->client->get(
            $this->baseUrl . '/oauth2/auth/requests/logout', [
                'query' => [
                    'logout_challenge' => $logoutChallenge,
                ]
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Accept a Logout Request
     *
     * @param string $logoutChallenge
     * @param array $params
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function acceptLogoutRequest(string $logoutChallenge, array $params): object
    {
        $response = $this->client->put(
            $this->baseUrl . '/oauth2/auth/requests/logout/accept', [
                'query' => [
                    'logout_challenge' => $logoutChallenge,
                ],
                'json' => $params,
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Reject a Logout Request
     *
     * @param string $logoutChallenge
     * @param array $params
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function rejectLogoutRequest(string $logoutChallenge, array $params): object
    {
        $response = $this->client->put(
            $this->baseUrl . '/oauth2/auth/requests/logout/reject', [
                'query' => [
                    'logout_challenge' => $logoutChallenge,
                ],
                'json' => $params,
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Introspect OAuth2 Tokens
     *
     * @param string $token
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function introspectOAuth2Token(string $token): object
    {
        $response = $this->client->post(
            $this->baseUrl . '/oauth2/introspect', [
                'form_params' => [
                    'token' => $token,
                ],
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Delete OAuth2 Access Tokens from a Client
     *
     * @param string $clientId
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function deleteOAuth2Token(string $clientId): object
    {
        $response = $this->client->delete(
            $this->baseUrl . '/oauth2/tokens', [
                'query' => [
                    'client_id' => $clientId,
                ],
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Lists All Consent Sessions of a Subject
     *
     * @param string $subject
     *
     * @return array
     *
     * @throws GuzzleException
     */
    public function listSubjectConsentSessions(string $subject): array
    {
        $response = $this->client->get(
            $this->baseUrl . '/oauth2/auth/sessions/consent', [
                'query' => [
                    'subject' => $subject,
                ],
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Revokes Consent Sessions of a Subject for a Specific OAuth 2.0 Client
     *
     * @param array $params
     *
     * @throws GuzzleException
     */
    public function revokeConsentSessions(array $params)
    {
        $this->client->delete(
            $this->baseUrl . '/oauth2/auth/sessions/consent', [
                'query' => http_build_query($params),
            ]
        );
    }

    /**
     * Invalidates All Login Sessions of a Certain User Invalidates a Subject's Authentication Session
     *
     * @param string $subject
     *
     * @throws GuzzleException
     */
    public function revokeAuthenticationSession(string $subject)
    {
        $this->client->delete(
            $this->baseUrl . '/oauth2/auth/sessions/login', [
                'query' => [
                    'subject' => $subject,
                ],
            ]
        );
    }

    /**
     * Flush Expired OAuth2 Access Tokens
     *
     * @param string $notAfter
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function flushInactiveOAuth2Tokens(string $notAfter): object
    {
        $response = $this->client->post(
            $this->baseUrl . '/oauth2/flush', [
                'json' => [
                    'notAfter' => $notAfter,
                ],
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Fetch a JSON Web Key
     *
     * @param string $set
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function getJsonWebKey(string $set): object
    {
        $response = $this->client->get($this->baseUrl . '/keys/' . $set);

        return json_decode($response->getBody());
    }

    /**
     * Update a JSON Web Key Set
     *
     * @param string $set
     * @param array $params
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function updateJsonWebKeySet(string $set, array $params): object
    {
        $response = $this->client->put(
            $this->baseUrl . '/keys/' . $set, [
                'json' => $params
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Generate a New JSON Web Key
     *
     * @param string $set
     * @param string $alg
     * @param string $kid
     * @param string $use
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function createJsonWebKeySet(string $set, string $alg, string $kid, string $use): object
    {
        $response = $this->client->post(
            $this->baseUrl . '/keys/' . $set, [
                'json' => [
                    'alg' => $alg,
                    'kid' => $kid,
                    'use' => $use,
                ],
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Delete a JSON Web Key Set
     *
     * @param string $set
     *
     * @throws GuzzleException
     */
    public function deleteJsonWebKeySet(string $set)
    {
        $this->client->delete($this->baseUrl . '/keys/' . $set);
    }

    /**
     * Retrieve a JSON Web Key Set
     *
     * @param string $set
     * @param string $kid
     * @param array $params
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function getJsonWebKeySet(string $set, string $kid, array $params): object
    {
        $response = $this->client->get(
            $this->baseUrl . '/keys/' . $set . '/' . $kid, [
                'json' => $params
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Update a JSON Web Key
     *
     * @param string $set
     * @param string $kid
     * @param array $params
     *
     * @return object
     *
     * @throws GuzzleException
     */
    public function updateJsonWebKey(string $set, string $kid, array $params): object
    {
        $response = $this->client->put(
            $this->baseUrl . '/keys/' . $set . '/' . $kid, [
                'json' => $params
            ]
        );

        return json_decode($response->getBody());
    }

    /**
     * Delete a JSON Web Key
     *
     * @param string $set
     * @param string $kid
     *
     * @throws GuzzleException
     */
    public function deleteJsonWebKey(string $set, string $kid)
    {
        $this->client->delete($this->baseUrl . '/keys/' . $set . '/'. $kid);
    }

    public function getVersion(): object
    {
        $response = $this->client->get($this->baseUrl . '/version');

        return json_decode($response->getBody());
    }

    public function isInstanceAlive(): object
    {
        $response = $this->client->get($this->baseUrl . '/health/alive');

        return json_decode($response->getBody());
    }
}
