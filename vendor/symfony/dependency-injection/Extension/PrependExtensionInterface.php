<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace MonorepoBuilder20210710\Symfony\Component\DependencyInjection\Extension;

use MonorepoBuilder20210710\Symfony\Component\DependencyInjection\ContainerBuilder;
interface PrependExtensionInterface
{
    /**
     * Allow an extension to prepend the extension configurations.
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function prepend($container);
}