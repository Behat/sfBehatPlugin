<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2011 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Behat adapter for sfTestFunctional.
 *
 * @package     sfBehatPlugin
 * @author      Konstantin Kudryashov <ever.zet@gmail.com>
 */
class sfBehatTestFunctional extends sfTestFunctional
{
  /**
   * Overload sfTestFunctional::shutdown, so it not throws exceptions. 
   */
  public function shutdown() {}
}
