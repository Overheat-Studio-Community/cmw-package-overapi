<?php

namespace CMW\Mapper\OverApi;

use CMW\Entity\OverApi\RequestErrorEntity;
use CMW\Manager\Package\GlobalObject;
use CMW\Type\OverApi\RequestsErrorsTypes;

class RequestsErrorsMapper extends GlobalObject
{
    public function map(RequestsErrorsTypes $type): RequestErrorEntity
    {
        return match ($type) {
            RequestsErrorsTypes::OVERLOAD_REQUEST => new RequestErrorEntity(
                "overload request",
                431,
                RequestsErrorsTypes::OVERLOAD_REQUEST,
            ),
            RequestsErrorsTypes::NON_AUTHORIZED_REQUEST => new RequestErrorEntity(
                "non authorized request",
                401,
                RequestsErrorsTypes::NON_AUTHORIZED_REQUEST,
            ),
            RequestsErrorsTypes::FORBIDDEN => new RequestErrorEntity(
                "forbidden",
                403,
                RequestsErrorsTypes::FORBIDDEN,
            ),
            RequestsErrorsTypes::INVALID_REQUEST => new RequestErrorEntity(
                "invalid request",
                400,
                RequestsErrorsTypes::INVALID_REQUEST,
            ),
            RequestsErrorsTypes::WRONG_PARAMS => new RequestErrorEntity(
                "wrong params",
                400,
                RequestsErrorsTypes::WRONG_PARAMS,
            ),
            RequestsErrorsTypes::INTERNAL_SERVER_ERROR => new RequestErrorEntity(
                "internal server error",
                500,
                RequestsErrorsTypes::INTERNAL_SERVER_ERROR,
            ),
            RequestsErrorsTypes::NOT_FOUND => new RequestErrorEntity(
                "not found",
                404,
                RequestsErrorsTypes::NOT_FOUND,
            ),
            RequestsErrorsTypes::CONTENT_ALREADY_EXIST => new RequestErrorEntity(
                "content already exist",
                409,
                RequestsErrorsTypes::CONTENT_ALREADY_EXIST,
            ),
            RequestsErrorsTypes::PAGE_EXPIRED => new RequestErrorEntity(
                "page expired",
                419,
                RequestsErrorsTypes::PAGE_EXPIRED,
            ),
            RequestsErrorsTypes::TOO_MANY_REQUESTS => new RequestErrorEntity(
                "too many requests",
                429,
                RequestsErrorsTypes::TOO_MANY_REQUESTS,
            ),
            RequestsErrorsTypes::CLIENT_CLOSED_REQUEST => new RequestErrorEntity(
                "client closed request",
                499,
                RequestsErrorsTypes::CLIENT_CLOSED_REQUEST,
            ),
            RequestsErrorsTypes::NO_RESPONSE => new RequestErrorEntity(
                "no response",
                444,
                RequestsErrorsTypes::NO_RESPONSE,
            ),
        };
    }
}