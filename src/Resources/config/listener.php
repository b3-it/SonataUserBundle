<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Sonata\UserBundle\Listener\LastLoginListener;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\DependencyInjection\Loader\Configurator\ReferenceConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // Use "service" function for creating references to services when dropping support for Symfony 4
    $containerConfigurator->services()

        ->set('sonata.user.listener.last_login', LastLoginListener::class)
            ->tag('kernel.event_subscriber')
            ->args([
                new ReferenceConfigurator('sonata.user.manager.user'),
            ]);
};
