<?php

namespace Lychen\CoreBundle\Service;

class EmailObfuscator
{
    public function hashEmail(string $email): string
    {
        return hash('sha256', $email);
    }

    public function redactEmail(string $email): string
    {
        return '[REDACTED_EMAIL]';
    }

    public function maskEmail(string $email): string
    {
        $parts = explode('@', $email);
        if (count($parts) !== 2) {
            return '[INVALID_EMAIL]'; // Handle invalid email format
        }

        $username = $parts[0];
        $domain = $parts[1];

        $maskedUsername = substr($username, 0, 1) . str_repeat('*', max(0, strlen($username) - 2)) . substr($username, -1);
        $maskedDomain = substr($domain, 0, 1) . str_repeat('*', max(0, strlen($domain) - 2)) . substr($domain, -1);
        return $maskedUsername . '@' . $maskedDomain;
    }

     /**
     * Choose your method of obfuscation
     *
     * @param string $email
     * @return string
     */
    public function obfuscate(string $email): string
    {
        return $this->maskEmail($email);
        //return $this->hashEmail($email);
        //return $this->redactEmail($email);
    }
}
