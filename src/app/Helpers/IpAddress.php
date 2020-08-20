<?php

namespace App\Helpers;

use Symfony\Component\HttpFoundation\IpUtils;

class IpAddress
{
    /**
     * All loopback addresses.
     *
     * @var array
     */
    public const LOOPBACK = [
        '127.0.0.1',
        '::1',
        'localhost'
    ];

    /**
     * Check if it's a valid IP address.
     *
     * @param string $ip
     *
     * @return bool
     */
    public static function isValid(string $ip): bool
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6) === $ip;
    }

    /**
     * Return whether the ip is public or not.
     *
     * @param string $ip
     *
     * @return bool
     */
    public static function isPublic(string $ip): bool
    {
        return self::isValid($ip) && filter_var(
            $ip,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
        ) === $ip;
    }

    /**
     * Return whether the ip is private or not.
     *
     * @param string $ip
     *
     * @return bool
     */
    public static function isPrivate(string $ip): bool
    {
        return self::isValid($ip) && !self::isPublic($ip);
    }

    /**
     * Check if IP is an IPv6 address.
     *
     * @param string $ip
     *
     * @return bool
     */
    public static function isIPv6(string $ip): bool
    {
        return self::isValid($ip) && substr_count($ip, ':') > 1;
    }

    /**
     * Check if IP is an IPv4 address.
     *
     * @param string $ip
     *
     * @return bool
     */
    public static function isIPv4(string $ip): bool
    {
        return self::isValid($ip) && !self::isIPv6($ip);
    }

    /**
     * Return if the IP is a loopback address.
     *
     * @param string $ip
     *
     * @return bool
     */
    public static function isLoopback(string $ip): bool
    {
        return in_array($ip, self::LOOPBACK, true);
    }

    /**
     * Check if the IP match with at least one of the range parameters.
     *
     * @param string $ip
     * @param mixed $range
     *
     * @return bool
     */
    public static function authorize(string $ip, $range): bool
    {
        if (self::isLoopback($ip)) {
            $ip = '127.0.0.1';
        }

        if (self::isIPv4($ip)) {
            if (is_array($range)) {
                foreach ($range as $ipRange) {
                    if (static::authorize($ip, $ipRange)) {
                        return true;
                    }
                }

                return false;
            }

            // All authorized
            if ($range === '*') {
                $range = '0.0.0.0-255.255.255.255';
            }

            // If is a local IP
            if (self::isLoopback($range) && self::isPrivate($ip)) {
                return true;
            }

            // Wildcarded range
            // 192.168.1.*
            if (!str_contains($range, '-') && str_contains($range, '*')) {
                $range = str_replace('*', '0', $range) . '-' . str_replace('*', '255', $range);
            }

            // Dashed range
            //   192.168.1.1-192.168.1.100
            //   0.0.0.0-255.255.255.255
            $twoIps = explode('-', $range);
            if (count($twoIps) === 2) {
                $ip1 = ip2long($twoIps[0]);
                $ip2 = ip2long($twoIps[1]);

                return ip2long($ip) >= $ip1 && ip2long($ip) <= $ip2;
            }
        }

        return IpUtils::checkIp($ip, $range);
    }
}
