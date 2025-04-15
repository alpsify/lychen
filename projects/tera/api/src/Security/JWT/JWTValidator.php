<?php

namespace App\Security\JWT;

use stdClass;

readonly class JWTValidator
{
    public function isValid(stdClass $decodedJwt): bool
    {
        if (!isset($decodedJwt->iat)) {
            return false;
        }

        if (!isset($decodedJwt->iss) || $decodedJwt->iss !== JWTEncoder::ISSUER) {
            return false;
        }

        if (!isset($decodedJwt->jti)) {
            return false;
        }

        if (isset($decodedJwt->exp) && $decodedJwt->exp < time()) {
            return false;
        }

        return true;
    }
}
