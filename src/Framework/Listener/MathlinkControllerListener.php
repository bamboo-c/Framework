<?php

/*
 * This file is part of the UCSDMath package.
 *
 * Copyright 2016 UCSD Mathematics | Math Computing Support <mathhelp@math.ucsd.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace UCSDMath\Framework\Listener;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * MathlinkControllerListener is the default implementation of {@link FrameworkInterface} which
 * provides routine framework methods that are commonly used throughout the framework.
 * MathlinkControllerListener checks events dispatched.
 *
 * Method list: (+) @api, (-) protected or private visibility.
 *
 * (+) onCoreController(FilterControllerEvent $event);
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 *
 * @api
 */
class MathlinkControllerListener implements FrameworkInterface
{
    /**
     * Constants.
     *
     * @var string VERSION A version number
     *
     * @api
     */
    const VERSION = '1.7.0';

    //--------------------------------------------------------------------------

    /**
     * Properties.
     */
    protected $controller;

    //--------------------------------------------------------------------------

    /**
     * Check event status.
     *
     *   - HttpKernelInterface::MASTER_REQUEST === 1
     *   - HttpKernelInterface::SUB_REQUEST === 2
     *
     * @param FilterControllerEvent  $event A FilterControllerEvent
     *
     * @api
     */
    public function onCoreController(FilterControllerEvent $event)
    {
        if (HttpKernelInterface::MASTER_REQUEST === $event->getRequestType()) {
            $this->controller = $event->getController();

            if (isset($this->controller[0])) {
                $this->controller = $this->controller[0];

                if (method_exists($this->controller, 'preExecute')) {
                    $this->controller->preExecute();
                }
            }
        }
    }

    //--------------------------------------------------------------------------
}
