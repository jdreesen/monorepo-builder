<?php

// scoper-autoload.php @generated by PhpScoper

$loader = require_once __DIR__.'/autoload.php';

// Aliases for the whitelisted classes. For more information see:
// https://github.com/humbug/php-scoper/blob/master/README.md#class-whitelisting
if (!class_exists('ComposerAutoloaderInit89dd5f813f75c5cbc1c6eb6812649af8', false) && !interface_exists('ComposerAutoloaderInit89dd5f813f75c5cbc1c6eb6812649af8', false) && !trait_exists('ComposerAutoloaderInit89dd5f813f75c5cbc1c6eb6812649af8', false)) {
    spl_autoload_call('MonorepoBuilder20220523\ComposerAutoloaderInit89dd5f813f75c5cbc1c6eb6812649af8');
}
if (!class_exists('Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator', false) && !interface_exists('Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator', false) && !trait_exists('Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator', false)) {
    spl_autoload_call('MonorepoBuilder20220523\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator');
}
if (!class_exists('Normalizer', false) && !interface_exists('Normalizer', false) && !trait_exists('Normalizer', false)) {
    spl_autoload_call('MonorepoBuilder20220523\Normalizer');
}
if (!class_exists('ReturnTypeWillChange', false) && !interface_exists('ReturnTypeWillChange', false) && !trait_exists('ReturnTypeWillChange', false)) {
    spl_autoload_call('MonorepoBuilder20220523\ReturnTypeWillChange');
}
if (!class_exists('Symplify\ComposerJsonManipulator\ValueObject\ComposerJsonSection', false) && !interface_exists('Symplify\ComposerJsonManipulator\ValueObject\ComposerJsonSection', false) && !trait_exists('Symplify\ComposerJsonManipulator\ValueObject\ComposerJsonSection', false)) {
    spl_autoload_call('MonorepoBuilder20220523\Symplify\ComposerJsonManipulator\ValueObject\ComposerJsonSection');
}

// Functions whitelisting. For more information see:
// https://github.com/humbug/php-scoper/blob/master/README.md#functions-whitelisting
if (!function_exists('resolveConfigFile')) {
    function resolveConfigFile() {
        return \MonorepoBuilder20220523\resolveConfigFile(...func_get_args());
    }
}
if (!function_exists('composerRequire89dd5f813f75c5cbc1c6eb6812649af8')) {
    function composerRequire89dd5f813f75c5cbc1c6eb6812649af8() {
        return \MonorepoBuilder20220523\composerRequire89dd5f813f75c5cbc1c6eb6812649af8(...func_get_args());
    }
}
if (!function_exists('scanPath')) {
    function scanPath() {
        return \MonorepoBuilder20220523\scanPath(...func_get_args());
    }
}
if (!function_exists('lintFile')) {
    function lintFile() {
        return \MonorepoBuilder20220523\lintFile(...func_get_args());
    }
}
if (!function_exists('array_is_list')) {
    function array_is_list() {
        return \MonorepoBuilder20220523\array_is_list(...func_get_args());
    }
}
if (!function_exists('setproctitle')) {
    function setproctitle() {
        return \MonorepoBuilder20220523\setproctitle(...func_get_args());
    }
}
if (!function_exists('enum_exists')) {
    function enum_exists() {
        return \MonorepoBuilder20220523\enum_exists(...func_get_args());
    }
}

return $loader;
