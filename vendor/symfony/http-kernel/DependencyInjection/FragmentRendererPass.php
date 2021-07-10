<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace MonorepoBuilder20210710\Symfony\Component\HttpKernel\DependencyInjection;

use MonorepoBuilder20210710\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use MonorepoBuilder20210710\Symfony\Component\DependencyInjection\Compiler\ServiceLocatorTagPass;
use MonorepoBuilder20210710\Symfony\Component\DependencyInjection\ContainerBuilder;
use MonorepoBuilder20210710\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use MonorepoBuilder20210710\Symfony\Component\DependencyInjection\Reference;
use MonorepoBuilder20210710\Symfony\Component\HttpKernel\Fragment\FragmentRendererInterface;
/**
 * Adds services tagged kernel.fragment_renderer as HTTP content rendering strategies.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class FragmentRendererPass implements \MonorepoBuilder20210710\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface
{
    private $handlerService;
    private $rendererTag;
    public function __construct(string $handlerService = 'fragment.handler', string $rendererTag = 'kernel.fragment_renderer')
    {
        if (0 < \func_num_args()) {
            trigger_deprecation('symfony/http-kernel', '5.3', 'Configuring "%s" is deprecated.', __CLASS__);
        }
        $this->handlerService = $handlerService;
        $this->rendererTag = $rendererTag;
    }
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function process($container)
    {
        if (!$container->hasDefinition($this->handlerService)) {
            return;
        }
        $definition = $container->getDefinition($this->handlerService);
        $renderers = [];
        foreach ($container->findTaggedServiceIds($this->rendererTag, \true) as $id => $tags) {
            $def = $container->getDefinition($id);
            $class = $container->getParameterBag()->resolveValue($def->getClass());
            if (!($r = $container->getReflectionClass($class))) {
                throw new \MonorepoBuilder20210710\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException(\sprintf('Class "%s" used for service "%s" cannot be found.', $class, $id));
            }
            if (!$r->isSubclassOf(\MonorepoBuilder20210710\Symfony\Component\HttpKernel\Fragment\FragmentRendererInterface::class)) {
                throw new \MonorepoBuilder20210710\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException(\sprintf('Service "%s" must implement interface "%s".', $id, \MonorepoBuilder20210710\Symfony\Component\HttpKernel\Fragment\FragmentRendererInterface::class));
            }
            foreach ($tags as $tag) {
                $renderers[$tag['alias']] = new \MonorepoBuilder20210710\Symfony\Component\DependencyInjection\Reference($id);
            }
        }
        $definition->replaceArgument(0, \MonorepoBuilder20210710\Symfony\Component\DependencyInjection\Compiler\ServiceLocatorTagPass::register($container, $renderers));
    }
}