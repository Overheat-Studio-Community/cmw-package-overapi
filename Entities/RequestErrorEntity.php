<?php

namespace CMW\Entity\OverApi;

use CMW\Manager\Package\AbstractEntity;
use CMW\Type\OverApi\RequestsErrorsTypes;

/**
 * Class: @RequestErrorEntity
 * @package OverApi
 * @link https://craftmywebsite.fr/docs/fr/technical/creer-un-package/entities
 */
class RequestErrorEntity extends AbstractEntity
{
    private string $error;
    private int $code;
    private RequestsErrorsTypes $type;

    /**
     * @param string $error
     * @param int $code
     * @param RequestsErrorsTypes $type
     */
    public function __construct(string $error, int $code, RequestsErrorsTypes $type)
    {
        $this->error = $error;
        $this->code = $code;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return RequestsErrorsTypes
     */
    public function getType(): RequestsErrorsTypes
    {
        return $this->type;
    }
}
