<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace MonorepoBuilder20210714\Symfony\Component\HttpKernel\Controller\ArgumentResolver;

use MonorepoBuilder20210714\Symfony\Component\HttpFoundation\Request;
use MonorepoBuilder20210714\Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use MonorepoBuilder20210714\Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
/**
 * Yields the default value defined in the action signature when no value has been given.
 *
 * @author Iltar van der Berg <kjarli@gmail.com>
 */
final class DefaultValueResolver implements \MonorepoBuilder20210714\Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface
{
    /**
     * {@inheritdoc}
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata $argument
     */
    public function supports($request, $argument) : bool
    {
        return $argument->hasDefaultValue() || null !== $argument->getType() && $argument->isNullable() && !$argument->isVariadic();
    }
    /**
     * {@inheritdoc}
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata $argument
     */
    public function resolve($request, $argument) : iterable
    {
        (yield $argument->hasDefaultValue() ? $argument->getDefaultValue() : null);
    }
}
