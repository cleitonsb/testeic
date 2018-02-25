<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Application\Controller\IndexController;
use Application\Controller\Factory\IndexControlerFactory;
use Application\Model\Factory\GameTableFactory;
use Application\Model\Factory\GameTableGatewayFactory;
use Application\Model\Factory\PlayerTableFactory;
use Application\Model\Factory\PlayerTableGatewayFactory;

class Module implements ConfigProviderInterface, ServiceProviderInterface, ControllerProviderInterface
{
    const VERSION = '3.0.0dev';
    
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\GameTable::class => GameTableFactory::class,
                Model\GameTableGateway::class => GameTableGatewayFactory::class,   
                Model\PlayerTable::class => PlayerTableFactory::class,
                Model\PlayerTableGateway::class => PlayerTableGatewayFactory::class,
            ]
        ];
    }
    
    public function getControllerConfig()
    {
        return [
            'factories' => [
                IndexController::class => IndexControlerFactory::class,
            ]
        ];
    }
}
