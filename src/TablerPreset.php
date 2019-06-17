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

    /**
     * Update the bootstrapping files.
     */
    protected static function updateBootstrapping()
    {
        if (!self::expectsAssetsFolder()) {
            file_put_contents(base_path('webpack.mix.js'),
                str_replace(
                    'assets/',
                    '',
                    file_get_contents(base_path('webpack.mix.js'))
                )
            );
        }

        copy(__DIR__.'/tabler-stub/bootstrap.js', static::getResourcePath('js/bootstrap.js'));
        copy(__DIR__.'/tabler-stub/app.js', static::getResourcePath('js/app.js'));
        (new Filesystem())->copyDirectory(__DIR__.'/pages', resource_path('js'));
    }
}
