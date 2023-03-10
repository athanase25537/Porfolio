<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita4107937a6dcbdbc1b8833de939f5f0c
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Application\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Application\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita4107937a6dcbdbc1b8833de939f5f0c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita4107937a6dcbdbc1b8833de939f5f0c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita4107937a6dcbdbc1b8833de939f5f0c::$classMap;

        }, null, ClassLoader::class);
    }
}
