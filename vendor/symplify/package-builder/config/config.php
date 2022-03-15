<?php

declare (strict_types=1);
namespace MonorepoBuilder20220315;

use MonorepoBuilder20220315\SebastianBergmann\Diff\Differ;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use MonorepoBuilder20220315\Symplify\PackageBuilder\Console\Formatter\ColorConsoleDiffFormatter;
use MonorepoBuilder20220315\Symplify\PackageBuilder\Console\Output\ConsoleDiffer;
use MonorepoBuilder20220315\Symplify\PackageBuilder\Diff\Output\CompleteUnifiedDiffOutputBuilderFactory;
use MonorepoBuilder20220315\Symplify\PackageBuilder\Reflection\PrivatesAccessor;
return static function (\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->set(\MonorepoBuilder20220315\Symplify\PackageBuilder\Console\Formatter\ColorConsoleDiffFormatter::class);
    $services->set(\MonorepoBuilder20220315\Symplify\PackageBuilder\Console\Output\ConsoleDiffer::class);
    $services->set(\MonorepoBuilder20220315\Symplify\PackageBuilder\Diff\Output\CompleteUnifiedDiffOutputBuilderFactory::class);
    $services->set(\MonorepoBuilder20220315\SebastianBergmann\Diff\Differ::class);
    $services->set(\MonorepoBuilder20220315\Symplify\PackageBuilder\Reflection\PrivatesAccessor::class);
};
