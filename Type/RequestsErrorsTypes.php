<?php

namespace CMW\Type\OverApi;

/**
 * Enum: @RequestsErrorsTypes
 * @package OverApi
 */
enum RequestsErrorsTypes: string
{
    case OVERLOAD_REQUEST = "OVERLOAD_REQUEST";
    case NON_AUTHORIZED_REQUEST = "NON_AUTHORIZED_REQUEST";
    case FORBIDDEN = "FORBIDDEN";
    case INVALID_REQUEST = "INVALID_REQUEST";
    case WRONG_PARAMS = "WRONG_PARAMS";
    case INTERNAL_SERVER_ERROR = "INTERNAL_SERVER_ERROR";
    case NOT_FOUND = "NOT_FOUND";
    case CONTENT_ALREADY_EXIST = "CONTENT_ALREADY_EXIST";
    case TOO_MANY_REQUESTS = "TOO_MANY_REQUESTS";
    case PAGE_EXPIRED = "PAGE_EXPIRED";
    case CLIENT_CLOSED_REQUEST = "CLIENT_CLOSED_REQUEST";
    case NO_RESPONSE = "NO_RESPONSE";

    public static function fromName(string $name): self
    {
        foreach (self::cases() as $method) {
            if ($name === $method->name) {
                return $method;
            }
        }
        throw new \ValueError("$name is not a valid backing value for enum RequestsErrorsTypes");
    }
}
