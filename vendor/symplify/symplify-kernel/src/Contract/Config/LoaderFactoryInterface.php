<?php

declare (strict_types=1);
namespace MonorepoBuilder20211227\Symplify\SymplifyKernel\Contract\Config;

use MonorepoBuilder20211227\Symfony\Component\Config\Loader\LoaderInterface;
use MonorepoBuilder20211227\Symfony\Component\DependencyInjection\ContainerBuilder;
interface LoaderFactoryInterface
{
    public function create(\MonorepoBuilder20211227\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder, string $currentWorkingDirectory) : \MonorepoBuilder20211227\Symfony\Component\Config\Loader\LoaderInterface;
}
