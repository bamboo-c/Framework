<?php/* * This file is part of the UCSDMath package. * * (c) UCSD Mathematics | Math Computing Support <mathhelp@math.ucsd.edu> * * For the full copyright and license information, please view the LICENSE * file that was distributed with this source code. */namespace UCSDMath\Framework;/** * ApplicationCoreInterface is the interface implemented by all {@link UCSDMath\Framework\ApplicationCore} classes. * * @author Daryl Eisner <deisner@ucsd.edu> */interface ApplicationCoreInterface{    /**     * Constants.     */    const REQUIRED_PHP_VERSION = '5.5.0';    const DEFAULT_CHARSET = 'UTF-8';}