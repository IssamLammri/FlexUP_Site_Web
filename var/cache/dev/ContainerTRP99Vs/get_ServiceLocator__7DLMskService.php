<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator..7DLMsk' shared service.

return $this->privates['.service_locator..7DLMsk'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'service' => ['privates', '.errored..service_locator..7DLMsk.App\\Entity\\Service', NULL, 'Cannot autowire service ".service_locator..7DLMsk": it references class "App\\Entity\\Service" but no such service exists.'],
]);