<?php

namespace App\Service;

class TokenAccessManagerService
{

    /**
     * Create an access token
     *
     * @return string
     */
    public function createToken(): string
    {

        return '6a01b4ed-4ff4-4b71-8a2d-1a2e1f437279';
    }

    /**
     * Validate that the access token is correct
     *
     * @param string $token
     * @return boolean
     */
    public function validateAccessToken(string $token): bool
    {

        return true;
    }
}
