<?php
namespace Colemando\RatchetioBundle\Twig;

class RatchetioExtension extends \Twig_Extension
{
    private $access_token;

    public function __construct($access_token)
    {
        $this->access_token = $access_token;
    }

    public function getFunctions()
    {
        return array(
            'ratchetio' => new \Twig_Function_Method($this, 'getInitCode',
                array('needs_context' => true, 'is_safe' => array('html')))
        );
    }

    public function getInitCode(array $context)
    {
        $env    = $context['app']->getEnvironment();
        $user   = $context['app']->getUser();

        $params = array(
            'server.environment' => 'prod' !== $env ? 'development' : 'production'
        );

        if (isset($user)) {
            $params['person'] = array(
                'id'       => $user->getId(),
                'username' => $user->getUsername(),
                'email'    => $user->getEmail()
            );
        }

        $params = json_encode($params);
        return <<<END_HTML
<script type="text/javascript">
var _ratchetParams = {$params};
_ratchetParams["notifier.snippet_version"] = "1"; var _ratchet=["{$this->access_token}", _ratchetParams];
(function(w,d){w.onerror=function(e,u,l){_ratchet.push({_t:'uncaught',e:e,u:u,l:l});};var i=function(){var s=d.createElement("script");var
f=d.getElementsByTagName("script")[0];s.src="//d2tf6sbdgil6xr.cloudfront.net/js/1/ratchet.min.js";s.async=!0;
f.parentNode.insertBefore(s,f);};if(w.addEventListener){w.addEventListener("load",i,!1);}else{w.attachEvent("onload",i);}})(window,document);
</script>
END_HTML;
    }

    public function getName()
    {
        return 'colemando_ratchetio';
    }
}

