<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Base symfony environment for Behat
 *
 * @package     sfBehatPlugin
 * @author      Konstantin Kudryashov <ever.zet@gmail.com>
 */
class sfBrowserEnvironment extends Everzet\Behat\Environment\WorldEnvironment
{
  /**
   * @see Everzet\Behat\Environment\WorldEnvironment
   */
  public function __construct($envFile)
  {
    $this->browser     = new sfTestFunctional(new sfBrowser(), new sfLimePhpUnitAdapter());
    $this->context     = $this->browser->getContext();
    $this->request     = $this->browser->getRequest();
    $this->response    = $this->browser->getResponse();

    $this->pathTo = function($page) {
      return $page;
    };

    $this->browser->setTesters(array(
        'request'   => 'sfTesterRequest',
        'response'  => 'sfTesterResponse',
        'user'      => 'sfTesterUser',
        'mailer'    => 'sfTesterMailer',
        'cache'     => 'sfTesterViewCache'
    ));

    parent::__construct($envFile);
  }
}
