<?php declare(strict_types=1);
namespace LastEdit;

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
    }

    public function add_formatting($event) {
        $view = $event->getTarget();
        $item = $view->vars()->resource;
        if ($item != null)
            echo "<span style='font-size: 0.80em; background-color: gray; color:white; padding:5px; border-radius: 5px'>Last edit: " . $item->modified()->format('Y-m-d H:i:s') . "</span>";

    }

}