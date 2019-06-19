<?php

namespace NitinKaware\TablerPreset;

use cesaramirez\Presets\Tabler\TablerPreset as BaseTablerPreset;
use Illuminate\Filesystem\Filesystem;

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

        copy(__DIR__ . '/tabler-stub/bootstrap.js', static::getResourcePath('js/bootstrap.js'));
        copy(__DIR__ . '/tabler-stub/app.js', static::getResourcePath('js/app.js'));
        copy(__DIR__ . '/tabler-stub/routes.js', static::getResourcePath('js/routes.js'));

        (new Filesystem())->copyDirectory(__DIR__ . '\tabler-stub\Pages', resource_path('js\Pages'));
    }

    /**
     * Update the given package array.
     *
     * @param array $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
                'form-object' => '^1.7.1',
                'vue-router' => '^3.0.6',
            ] + $packages;
    }
}
