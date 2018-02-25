<?php

namespace Application\Model\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Application\Model\PlayerTable;

use Application\Model;

class PlayerTableFactory implements FactoryInterface
{
    
    function __invoke(ContainerInterface $container, $requestedName, array $option = null)
    {
        $tableGateway = $container->get(Model\PlayerTableGateway::class);
        return new PlayerTable($tableGateway);
    }
}