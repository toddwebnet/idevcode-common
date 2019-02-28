<?php

namespace IDevCode\Services\Api;

class AuthServerApi extends BaseApi
{
    public function __construct(string $baseUrl = '')
    {
        $baseUrl = env('AUTH_SERVER_API_URL', 'http://auth.dev.idevcode.com');
        parent::__construct($baseUrl);
    }

    public function authenticate($username, $password)
    {
        $endpoint = '/authenticate';
        $params = [
            'username' => $username,
            'password' => $password,
        ];
        $response = $this->call('POST', $endpoint, $params);
    }
}
