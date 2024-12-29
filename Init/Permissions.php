<?php

namespace CMW\Permissions\OverApi;

use CMW\Manager\Permission\IPermissionInit;

/**
 * Class: Permissions
 * @package OverApi
 * @link https://craftmywebsite.fr/docs/fr/technical/creer-un-package/initialisation-init
 */
class Permissions implements IPermissionInit
{
    public function permissions(): array
    {
        return [];
    }
}
