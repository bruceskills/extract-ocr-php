<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfd2e5d0b4facb34de74bf9216c2cfe4e
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'OCR\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'OCR\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfd2e5d0b4facb34de74bf9216c2cfe4e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfd2e5d0b4facb34de74bf9216c2cfe4e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
