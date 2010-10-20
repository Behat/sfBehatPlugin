<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfBehatTesterMailer implements tests for mails submitted by the user.
 *
 * @package    sfBehatPlugin
 * @subpackage test
 * @author     Konstantin Kudryashov <ever.zet@gmail.com>
 */
class sfBehatTesterMailer extends sfTesterMailer
{
  /**
   * Outputs some debug information about mails sent during the current request.
   */
  public function debug()
  {
    foreach ($this->logger->getMessages() as $message)
    {
      echo $message->toString()."\n\n";
    }
  }
}
