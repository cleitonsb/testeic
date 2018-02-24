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
                /* Model\NfeTable::class => NfeTableFactory::class,
                Model\NfeTableGateway::class => NfeTableGatewayFactory::class,
                NfeForm::class  => NfeFormFactory::class,
                
                Model\NfeprodTable::class => NfeprodTableFactory::class,
                Model\NfeprodTableGateway::class => NfeprodTableGatewayFactory::class, */
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
