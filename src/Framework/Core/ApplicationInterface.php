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

namespace UCSDMath\Framework\Core;

use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * ApplicationInterface is the interface implemented by all Framework classes.
 *
 * Method noted as: (+) @api.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 *
 * @api
 */
interface ApplicationInterface
{
    /**
     * Constants.
     */
    const REQUIRED_PHP_VERSION = '7.0.0';
    const DEFAULT_CHARSET = 'UTF-8';

    //--------------------------------------------------------------------------

    /**
     * Set the application default route or location URI (e.g., /sso/1/news-manager/).
     * If any problem with mapping URL Routing, we default to this location.
     *
     * @param string $defaultRoute  A defined URI path
     *
     * @return ApplicationInterface The current instance
     *
     * @api
     */
    public function setDefaultRoute(string $defaultRoute = null): ApplicationInterface;

    //--------------------------------------------------------------------------

    /**
     * Redirect to a location.
     *
     * @param string  $path  A defined URI path
     *
     * @api
     */
    public function redirectRoute(string $path);

    //--------------------------------------------------------------------------

    /**
     * Creating a map method that binds a URI to a PHP callback that will be executed
     * if the right URI is matched. This way all routing can be defined in the top
     * controller of the application.
     *
     * Associates an URI or URL with a callback function.
     *
     * @param string  $path        A defined URI path
     * @param Object  $controller  A callback function (reference a defined closure)
     *
     * @return HttpKernelInterface The current instance
     *
     * @api
     */
    public function map(string $path, $controller): HttpKernelInterface;

    //--------------------------------------------------------------------------

    /**
     * Add event listener to the dispatcher.
     *
     * The EventDispatcher class allows us to register listeners to particular events
     * that can be triggered through a callable function or method.
     *
     * Here we can bind an event to a PHP callback function.  The components of this
     * application allows it to communicate by implementing an Observer pattern.
     *
     * @see http://en.wikipedia.org/wiki/Observer_pattern
     *
     * @param EventDispatcher  $event     A defined EventDispatcher Interface
     * @param Object           $callback  A callback function (reference a defined closure)
     *
     * @return HttpKernelInterface The current instance
     *
     * @api
     */
    public function on($event, $callback): HttpKernelInterface;

    //--------------------------------------------------------------------------

    /**
     * Tell dispatcher to notify all the listeners he knows when some event occurs.
     *
     * @param EventDispatcher  $event   A EventDispatcher Interface
     *
     * @return A dispached event
     *
     * @api
     */
    public function fire($event);

    //--------------------------------------------------------------------------

    /**
     * Bootstrap any needed resources for the core application.
     *
     * @return ApplicationInterface The current instance
     *
     * @api
     */
    public function startupApplication(): ApplicationInterface;

    //--------------------------------------------------------------------------
}
