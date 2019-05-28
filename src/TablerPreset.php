<?php

namespace NitinKaware\TablerPreset;

use cesaramirez\Presets\Tabler\TablerPreset as BaseTablerPreset;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;

class TablerPreset extends BaseTablerPreset
{
    /**
     * Install the preset.
     */
    public static function install()
    {
        static::updatePackages();
        static::updateAssets();
        static::updateBootstrapping();
    }

    /**
     * Install the preset and auth views.
     */
    public static function installAuth()
    {
        static::install();
        static::scaffoldAuth();
    }
}
