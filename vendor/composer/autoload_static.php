<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita972d82cc7de132b42a1c8cc8ef8eee3
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita972d82cc7de132b42a1c8cc8ef8eee3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita972d82cc7de132b42a1c8cc8ef8eee3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita972d82cc7de132b42a1c8cc8ef8eee3::$classMap;

        }, null, ClassLoader::class);
    }
}