<?php

namespace Application\Controller\Factory;

use Interop\Container\ContainerInterface;
use Application\Controller\IndexController;

class IndexControlerFactory
{
    function __invoke(ContainerInterface $container)
    {
        /* $nfeTable       = $container->get(NfeTable::class);
        $nfeForm        = $container->get(NfeForm::class);
        $nfeprodTable   = $container->get(NfeprodTable::class); */
                
        return new IndexController();
    }
}