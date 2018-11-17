<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit46d3216da358a817bb886d0bc54f122d
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit46d3216da358a817bb886d0bc54f122d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit46d3216da358a817bb886d0bc54f122d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}