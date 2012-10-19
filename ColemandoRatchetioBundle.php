<?php
namespace Colemando\RatchetioBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ColemandoRatchetioBundle extends Bundle
{
    public function boot()
    {
        parent::boot();

        if ($this->container->hasParameter('colemando_ratchetio.access_token')) {
            $access_token = $this->container->getParameter('colemando_ratchetio.access_token');
            $env          = $this->container->getParameter('kernel.environment');

            \Ratchetio::init([
                'access_token' => $access_token,
                'environment'  => 'prod' !== $env ? 'development' : 'production',
                'host'         => php_uname('n')
            ]);
        }
    }
}

