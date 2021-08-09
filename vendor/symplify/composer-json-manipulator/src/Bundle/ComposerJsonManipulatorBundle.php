<?php

declare (strict_types=1);
namespace MonorepoBuilder20210809\Symplify\ComposerJsonManipulator\Bundle;

use MonorepoBuilder20210809\Symfony\Component\HttpKernel\Bundle\Bundle;
use MonorepoBuilder20210809\Symplify\ComposerJsonManipulator\DependencyInjection\Extension\ComposerJsonManipulatorExtension;
final class ComposerJsonManipulatorBundle extends \MonorepoBuilder20210809\Symfony\Component\HttpKernel\Bundle\Bundle
{
    protected function createContainerExtension() : ?\MonorepoBuilder20210809\Symfony\Component\DependencyInjection\Extension\ExtensionInterface
    {
        return new \MonorepoBuilder20210809\Symplify\ComposerJsonManipulator\DependencyInjection\Extension\ComposerJsonManipulatorExtension();
    }
}
