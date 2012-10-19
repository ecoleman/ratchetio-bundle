RatchetioBundle
===============

Intergrates [ratchet.io](http://ratchet.io) with your Symfony2 application.

Installation
------------

Require the bundle using composer:

``` bash
$ composer require colemando/ratchetio-bundle
```

**Enable the Bundle**

Add ``Colemando\RatchetioBundle\ColemandoRatchetioBundle`` to your AppKernel:

```
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Colemando\RatchetioBundle\ColemandoRatchetioBundle(),
    );
}
```

**Configure your Access Token**

In your symfony configuration file (app/config.yml) you need to define your access_token for ratchet.io as follows:

``` yml
colemando_ratchetio:
  access_token: <your token here>
```


