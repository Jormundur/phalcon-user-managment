<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita89c7285b6d0b7be285faa308be58e95
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Ajax\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ajax\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmv/php-mv-ui/Ajax',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita89c7285b6d0b7be285faa308be58e95::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita89c7285b6d0b7be285faa308be58e95::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
