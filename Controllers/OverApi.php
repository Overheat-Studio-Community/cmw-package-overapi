<?php

namespace CMW\Controller\OverApi;

use CMW\Manager\Router\Link;
use CMW\Mapper\OverApi\RequestsErrorsMapper;
use CMW\Type\OverApi\RequestsErrorsTypes;
use CMW\Utils\ArrayFormatter;
use JetBrains\PhpStorm\NoReturn;
use JsonException;
use function header;
use function http_response_code;
use function json_encode;
use const JSON_THROW_ON_ERROR;

/**
 * Class: @OverApi
 * @package OverApi
 * @link https://craftmywebsite.fr/docs/fr/technical/creer-un-package/controllers
 */
class OverApi
{
    #[NoReturn] public static function returnError(RequestsErrorsTypes $type, array $data = []): void
    {
        header('Content-type: application/json;charset=utf-8');

        $error = RequestsErrorsMapper::getInstance()->map($type);

        http_response_code($error->getCode());

        $return['error']['code'] = $error->getCode();
        $return['error']['info'] = $error->getError();

        if ($data !== []) {
            $return['error']['description'] = $data;
        }

        try {
            print(json_encode($return, JSON_THROW_ON_ERROR));
        } catch (JsonException $e) {
            print($e);
        }

        die();
    }

    #[NoReturn] public static function returnData(array $toReturn): void
    {
        try {
            $responseCode = $toReturn === [] || empty($toReturn) ? 204 : 200;

            http_response_code($responseCode);

            print(json_encode(ArrayFormatter::convertToArray($toReturn), JSON_THROW_ON_ERROR));

        } catch (JsonException $e) {
            print($e);
        }
        die();
    }
}
