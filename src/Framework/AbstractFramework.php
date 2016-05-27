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

namespace UCSDMath\Framework;

/**
 * AbstractFramework provides an abstract base class implementation of {@link FrameworkInterface}.
 * This service groups a common code base implementation that Framework extends.
 *
 * Method list: (+) @api, (-) protected or private visibility.
 *
 * (+) FrameworkInterface __construct();
 * (+) void __destruct();
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
abstract class AbstractFramework implements FrameworkInterface
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
     *
     * @static FrameworkInterface $instance        A static instance FrameworkInterface
     * @static int                $objectCount     A static count of FrameworkInterface
     * @var    array              $storageRegister A stored set of data structures used by this class
     */
    protected static $instance;
    protected static $objectCount = 0;
    protected $storageRegister    = [];

    //--------------------------------------------------------------------------

    /**
     * Constructor.
     *
     * @api
     */
    public function __construct()
    {
        static::$instance = $this;
        static::$objectCount++;
    }

    //--------------------------------------------------------------------------

    /**
     * Destructor.
     *
     * @api
     */
    public function __destruct()
    {
        static::$objectCount--;
    }

    //--------------------------------------------------------------------------
}
