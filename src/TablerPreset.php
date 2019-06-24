<?php

namespace NitinKaware\TablerPreset;

use cesaramirez\Presets\Tabler\TablerPreset as BaseTablerPreset;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;

class TablerPreset extends BaseTablerPreset {

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
        if ( !self::expectsAssetsFolder()) {
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
        copy(__DIR__ . '/tabler-stub/.babelrc', base_path('.babelrc'));
        copy(__DIR__ . '/tabler-stub/webpack.mix.js', base_path('webpack.mix.js'));

        (new Filesystem())->copyDirectory(__DIR__ . '/tabler-stub/Pages', resource_path('js/Pages'));
    }

    /**
     * Export the authentication views.
     */
    protected static function scaffoldAuth()
    {
        file_put_contents(app_path('Http/Controllers/HomeController.php'), static::compileControllerStub());
        file_put_contents(
            base_path('routes/web.php'),
            "\nAuth::routes();\n\nRoute::get('/home', 'HomeController@index')->name('home');\n\n",
            FILE_APPEND
        );
        (new Filesystem())->copyDirectory(__DIR__.'/tabler-stubs/views', resource_path('views'));
    }

    /**
     * Compiles the HomeController stub.
     *
     * @return string
     */
    protected static function compileControllerStub()
    {
        return str_replace(
            '{{namespace}}',
            Container::getInstance()->getNamespace(),
            file_get_contents(__DIR__.'/tabler-stubs/controllers/HomeController.stub')
        );
    }

    /**
     * Update the given package array.
     *
     * @param array $packages
     *
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
                'form-object'                         => '^1.7.1',
                'vue-router'                          => '^3.0.6',
                '@babel/plugin-syntax-dynamic-import' => '*',
            ] + $packages;
    }
}
