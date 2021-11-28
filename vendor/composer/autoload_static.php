<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2679092b5c43ecec50e7f71a46e4f9d4
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInit2679092b5c43ecec50e7f71a46e4f9d4::$fallbackDirsPsr4;
            $loader->classMap = ComposerStaticInit2679092b5c43ecec50e7f71a46e4f9d4::$classMap;

        }, null, ClassLoader::class);
    }
}