<?php

namespace Application\Controller\Factory;

use Interop\Container\ContainerInterface;
use Application\Controller\IndexController;
use Application\Model\GameTable;
use Application\Model\PlayerTable;

class IndexControlerFactory
{
    function __invoke(ContainerInterface $container)
    {
        /* $nfeTable       = $container->get(NfeTable::class);
        $nfeForm        = $container->get(NfeForm::class);
        $nfeprodTable   = $container->get(NfeprodTable::class); */
        
        $gameTable      = $container->get(GameTable::class);
        $playerTable    = $container->get(PlayerTable::class);
        
        return new IndexController($gameTable, $playerTable);
    }
}