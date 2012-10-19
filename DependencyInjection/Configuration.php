<?php
namespace Colemando\RatchetioBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('colemando_ratchetio');

        $rootNode
            ->children()
                ->scalarNode('access_token')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
