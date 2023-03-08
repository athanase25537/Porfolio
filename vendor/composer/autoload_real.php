<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInita4107937a6dcbdbc1b8833de939f5f0c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInita4107937a6dcbdbc1b8833de939f5f0c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInita4107937a6dcbdbc1b8833de939f5f0c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInita4107937a6dcbdbc1b8833de939f5f0c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
