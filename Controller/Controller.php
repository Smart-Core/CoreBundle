<?php

namespace Smart\CoreBundle\Controller;

use Smart\CoreBundle\Flash\Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\ORM\EntityRepository;

/**
 * Inspired by KnpRadBundle
 */
class Controller extends BaseController
{
    protected function getParameter($name)
    {
        return $this->container->getParameter($name);
    }

    protected function redirectToRoute($route, array $parameters = [], $status = 302)
    {
        return new RedirectResponse($this->get('router')->generate($route, $parameters), $status);
    }

    // Doctrine

    protected function persist($object, $flush = false)
    {
        $this->get('doctrine.orm.entity_manager')->persist($object);

        if ($flush) {
            $this->flush($object);
        }
    }

    protected function flush($object = null)
    {
        $this->get('doctrine.orm.entity_manager')->flush($object);
    }

    protected function remove($object, $flush = false)
    {
        $this->get('doctrine.orm.entity_manager')->remove($object);

        if ($flush) {
            $this->flush();
        }
    }

    // Security

    protected function isGranted($attributes, $object = null)
    {
        return $this->get('security.authorization_checker')->isGranted($attributes, $object);
    }

    // Sessions and flashes

    protected function getSession()
    {
        return $this->get('session');
    }

    protected function addFlash($type, $message = null, array $parameters = [], $pluralization = null)
    {
        $message = $message ?: sprintf('%s.%s', $this->get('request_stack')->getMasterRequest()->attributes->get('_route'), $type);

        return $this->getSession()->getFlashBag()->add($type, new Message($message, $parameters, $pluralization));
    }

    protected function getFlashBag()
    {
        return $this->getSession()->getFlashBag();
    }
}
