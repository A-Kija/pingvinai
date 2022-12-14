<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf263a4403116369d5ea2cbdbdc63da38
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Gilus\\Miskas\\Paupy\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Gilus\\Miskas\\Paupy\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf263a4403116369d5ea2cbdbdc63da38::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf263a4403116369d5ea2cbdbdc63da38::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInitf263a4403116369d5ea2cbdbdc63da38::$fallbackDirsPsr4;
            $loader->classMap = ComposerStaticInitf263a4403116369d5ea2cbdbdc63da38::$classMap;

        }, null, ClassLoader::class);
    }
}
