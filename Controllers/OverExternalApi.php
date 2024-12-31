<?php

namespace CMW\Controller\OverApi;

use CMW\Manager\Requests\HttpMethodsType;
use CMW\Manager\Router\Link;
use CMW\Utils\Website;
use JsonException;
use function array_merge;
use function curl_close;
use function curl_exec;
use function curl_init;
use function curl_setopt_array;
use function json_decode;
use const CURL_HTTP_VERSION_2;
use const CURL_IPRESOLVE_V4;
use const CURLOPT_CUSTOMREQUEST;
use const CURLOPT_ENCODING;
use const CURLOPT_FOLLOWLOCATION;
use const CURLOPT_HTTP_VERSION;
use const CURLOPT_HTTPHEADER;
use const CURLOPT_IPRESOLVE;
use const CURLOPT_MAXREDIRS;
use const CURLOPT_POSTFIELDS;
use const CURLOPT_RETURNTRANSFER;
use const CURLOPT_SSL_VERIFYHOST;
use const CURLOPT_SSL_VERIFYPEER;
use const CURLOPT_TCP_KEEPALIVE;
use const CURLOPT_TIMEOUT;
use const CURLOPT_URL;
use const JSON_THROW_ON_ERROR;

/**
 * Class: @OverExternalApi
 * @package OverApi
 * @link https://craftmywebsite.fr/docs/fr/technical/creer-un-package/controllers
 */
class OverExternalApi
{
    public static function send(HttpMethodsType $methode, string $url, array $postFields = [], array $headers = [], bool $isAssociative = false): mixed
    {
        $headers = array_merge($headers, [
            'User-Agent: ' . Website::getWebsiteName(),
            'Accept: */*',
            'Accept-Encoding: gzip, deflate, br',
            'Connection: keep-alive',
        ]);

        if ($methode === HttpMethodsType::GET) {
            $headers['Content-Type'] = 'application/json;charset=utf-8';
        }

        $curl = curl_init();

        $settings = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2,
            CURLOPT_CUSTOMREQUEST => $methode->name,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $postFields,
            CURLOPT_TCP_KEEPALIVE => 1,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
        ];


        curl_setopt_array($curl, $settings);

        $response = curl_exec($curl);

        curl_close($curl);

        if (empty($response)) {
            return [];
        }

        try {
            return json_decode($response, $isAssociative, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            print $e;
            return false;
        }
    }
}
