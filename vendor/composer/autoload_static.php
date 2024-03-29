<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7b5a0d1d020dbb2e2ea6b44ea4eb5139
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PhpOption\\' => 
            array (
                0 => __DIR__ . '/..' . '/phpoption/phpoption/src',
            ),
        ),
    );

    public static $classMap = array (
        'scss_formatter' => __DIR__ . '/..' . '/leafo/scssphp/scss.inc.php',
        'scss_formatter_compressed' => __DIR__ . '/..' . '/leafo/scssphp/scss.inc.php',
        'scss_formatter_nested' => __DIR__ . '/..' . '/leafo/scssphp/scss.inc.php',
        'scss_parser' => __DIR__ . '/..' . '/leafo/scssphp/scss.inc.php',
        'scss_server' => __DIR__ . '/..' . '/leafo/scssphp/scss.inc.php',
        'scssc' => __DIR__ . '/..' . '/leafo/scssphp/scss.inc.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7b5a0d1d020dbb2e2ea6b44ea4eb5139::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7b5a0d1d020dbb2e2ea6b44ea4eb5139::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit7b5a0d1d020dbb2e2ea6b44ea4eb5139::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit7b5a0d1d020dbb2e2ea6b44ea4eb5139::$classMap;

        }, null, ClassLoader::class);
    }
}
