<?php declare(strict_types=1);
namespace CustomLinebreak;

use Laminas\Mvc\MvcEvent;
use Laminas\EventManager\Event;
use Laminas\EventManager\SharedEventManagerInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;
use Omeka\Module\AbstractModule;
use Omeka\Permissions\Assertion\OwnsEntityAssertion;

class Module extends AbstractModule
{
    public function attachListeners(SharedEventManagerInterface $sharedEventManager): void
    {
        $sharedEventManager->attach(
            'Omeka\Controller\Admin\Item',
            'view.show.after',
            [$this, 'add_formatting']
            );

        $sharedEventManager->attach(
            'Omeka\Controller\Admin\Item',
            'view.edit.after',
            [$this, 'add_formatting']
            );

        $sharedEventManager->attach(
            'Omeka\Controller\Admin\Item',
            'view.browse.after',
            [$this, 'add_formatting']
            );
        
        
    }

    public function add_formatting($event) {
        $view = $event->getTarget();
        $view->headScript()->appendFile($view->assetUrl('title-formatting.js', 'CustomLinebreak'), 'text/javascript', ['defer' => 'defer']);
    }

}