<?php

namespace Application\Model\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Application\Model\GameTable;

use Application\Model;

class GameTableFactory implements FactoryInterface
{
    
    function __invoke(ContainerInterface $container, $requestedName, array $option = null)
    {
        $tableGateway = $container->get(Model\GameTableGateway::class);
        return new GameTable($tableGateway);
    }
}