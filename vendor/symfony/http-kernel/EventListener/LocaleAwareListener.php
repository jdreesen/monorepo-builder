<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace MonorepoBuilder20210714\Symfony\Component\HttpKernel\EventListener;

use MonorepoBuilder20210714\Symfony\Component\EventDispatcher\EventSubscriberInterface;
use MonorepoBuilder20210714\Symfony\Component\HttpFoundation\RequestStack;
use MonorepoBuilder20210714\Symfony\Component\HttpKernel\Event\FinishRequestEvent;
use MonorepoBuilder20210714\Symfony\Component\HttpKernel\Event\RequestEvent;
use MonorepoBuilder20210714\Symfony\Component\HttpKernel\KernelEvents;
use MonorepoBuilder20210714\Symfony\Contracts\Translation\LocaleAwareInterface;
/**
 * Pass the current locale to the provided services.
 *
 * @author Pierre Bobiet <pierrebobiet@gmail.com>
 */
class LocaleAwareListener implements \MonorepoBuilder20210714\Symfony\Component\EventDispatcher\EventSubscriberInterface
{
    private $localeAwareServices;
    private $requestStack;
    /**
     * @param LocaleAwareInterface[] $localeAwareServices
     */
    public function __construct(iterable $localeAwareServices, \MonorepoBuilder20210714\Symfony\Component\HttpFoundation\RequestStack $requestStack)
    {
        $this->localeAwareServices = $localeAwareServices;
        $this->requestStack = $requestStack;
    }
    /**
     * @param \Symfony\Component\HttpKernel\Event\RequestEvent $event
     */
    public function onKernelRequest($event) : void
    {
        $this->setLocale($event->getRequest()->getLocale(), $event->getRequest()->getDefaultLocale());
    }
    /**
     * @param \Symfony\Component\HttpKernel\Event\FinishRequestEvent $event
     */
    public function onKernelFinishRequest($event) : void
    {
        if (null === ($parentRequest = $this->requestStack->getParentRequest())) {
            foreach ($this->localeAwareServices as $service) {
                $service->setLocale($event->getRequest()->getDefaultLocale());
            }
            return;
        }
        $this->setLocale($parentRequest->getLocale(), $parentRequest->getDefaultLocale());
    }
    public static function getSubscribedEvents()
    {
        return [
            // must be registered after the Locale listener
            \MonorepoBuilder20210714\Symfony\Component\HttpKernel\KernelEvents::REQUEST => [['onKernelRequest', 15]],
            \MonorepoBuilder20210714\Symfony\Component\HttpKernel\KernelEvents::FINISH_REQUEST => [['onKernelFinishRequest', -15]],
        ];
    }
    private function setLocale(string $locale, string $defaultLocale) : void
    {
        foreach ($this->localeAwareServices as $service) {
            try {
                $service->setLocale($locale);
            } catch (\InvalidArgumentException $e) {
                $service->setLocale($defaultLocale);
            }
        }
    }
}
