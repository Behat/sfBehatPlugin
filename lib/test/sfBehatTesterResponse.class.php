<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfBehatTesterResponse implements tests for the symfony response object.
 *
 * @package    sfBehatPlugin
 * @subpackage test
 * @author     Konstantin Kudryashov <ever.zet@gmail.com>
 */
class sfBehatTesterResponse extends sfTesterResponse
{
  /**
   * Outputs some debug information about the current response.
   *
   * @param string $realOutput Whether to display the actual content of the response when an error occurred
   *                           or the exception message and the stack trace to ease debugging
   */
  public function debug($realOutput = false)
  {
    print $this->tester->error('Response debug');

    if (!$realOutput && null !== sfException::getLastException())
    {
      // print the exception and the stack trace instead of the "normal" output
      $this->tester->comment('WARNING');
      $this->tester->comment('An error occurred when processing this request.');
      $this->tester->comment('The real response content has been replaced with the exception message to ease debugging.');
    }

    printf("HTTP/1.X %s\n", $this->response->getStatusCode());

    foreach ($this->response->getHttpHeaders() as $name => $value)
    {
      printf("%s: %s\n", $name, $value);
    }

    foreach ($this->response->getCookies() as $cookie)
    {
      vprintf("Set-Cookie: %s=%s; %spath=%s%s%s%s\n", array(
        $cookie['name'],
        $cookie['value'],
        null === $cookie['expire'] ? '' : sprintf('expires=%s; ', date('D d-M-Y H:i:s T', $cookie['expire'])),
        $cookie['path'],
        $cookie['domain'] ? sprintf('; domain=%s', $cookie['domain']) : '',
        $cookie['secure'] ? '; secure' : '',
        $cookie['httpOnly'] ? '; HttpOnly' : '',
      ));
    }

    echo "\n";
    if (!$realOutput && null !== $exception = sfException::getLastException())
    {
      echo $exception;
    }
    else
    {
      echo $this->response->getContent();
    }
    echo "\n";
  }
}
