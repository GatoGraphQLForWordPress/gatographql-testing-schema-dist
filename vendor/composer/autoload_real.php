<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitccf737ba59f52d3cb9d2ae148d495e06
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

        spl_autoload_register(array('ComposerAutoloaderInitccf737ba59f52d3cb9d2ae148d495e06', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitccf737ba59f52d3cb9d2ae148d495e06', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitccf737ba59f52d3cb9d2ae148d495e06::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
