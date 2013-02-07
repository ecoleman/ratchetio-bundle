<?php
namespace Colemando\RatchetioBundle\EventListener;

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if ($exception instanceof HttpException)
            return;

        \Ratchetio::report_exception($exception);
    }
}

