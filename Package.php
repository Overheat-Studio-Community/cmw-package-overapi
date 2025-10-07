<?php

namespace CMW\Package\OverApi;

use CMW\Manager\Package\IPackageConfigV2;

/**
 * Class: Package
 * @package OverApi
 * @link https://craftmywebsite.fr/docs/fr/technical/creer-un-package/packagephp
 */
class Package implements IPackageConfigV2
{
    public function name(): string
    {
        return 'OverApi';
    }

    public function version(): string
    {
        return '1.4.0';
    }

    public function authors(): array
    {
        return ['OverheatStudio'];
    }

    public function isGame(): bool
    {
        return false;
    }

    public function isCore(): bool
    {
        return false;
    }

    public function menus(): ?array
    {
        return [];
    }

    public function requiredPackages(): array
    {
        return ['Core'];
    }

    public function uninstall(): bool
    {
        // Return true, we don't need other operations for uninstall.
        return true;
    }

    public function cmwVersion(): string
    {
        return "beta-01";
    }

    public function imageLink(): ?string
    {
        return null;
    }

    public function author(): ?string
    {
        return "OverheatStudio";
    }

    public function compatiblesPackages(): array
    {
        return [];
    }
}
