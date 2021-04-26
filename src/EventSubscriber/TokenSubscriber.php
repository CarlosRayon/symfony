<?php

namespace App\EventSubscriber;

use App\Service\TokenAccessManagerService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class TokenSubscriber implements EventSubscriberInterface
{

    private $tokenAccessManagerService;

    /**
     * Constructor
     *
     * @param TokenAccessManagerService $tokenAccessManagerService
     */
    public function __construct(TokenAccessManagerService $tokenAccessManagerService)
    {

        $this->tokenAccessManagerService = $tokenAccessManagerService;
    }

    public static function getSubscribedEvents(): array
    {

        return [
            'kernel.request' => 'onKernelRequest',
        ];
    }

    /**
     * When get request
     *
     * @param ResponseEvent $event
     * @return void
     */
    public function onKernelRequest()
    {
    //     $token = $event->getRequest()->query->get('token');

    //     if (!$this->tokenValidatorService->validate($token))
    //         throw new AccessDeniedHttpException('Token inválido.');
    }
}
