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
   * Inits sfBrowser & sfTestFunctional
   */
  public function __construct()
  {
    $world            = $this;
    $this->browser    = new sfBehatTestFunctional(new sfBrowser(), new sfLimePhpUnitAdapter());
    $this->context    = $this->browser->getContext();
    $this->request    = $this->browser->getRequest();
    $this->response   = $this->browser->getResponse();

    $this->pathTo = function($page) {
      return $page;
    };

    $this->browser->setTesters(array(
        'response'  => 'sfBehatTesterResponse',
        'form'      => 'sfBehatTesterForm',
        'mailer'    => 'sfBehatTesterMailer',
        'request'   => 'sfTesterRequest',
        'user'      => 'sfTesterUser',
        'cache'     => 'sfTesterViewCache',
    ));
  }

  /**
   * Print custom tester debug. 
   * 
   * @param   string  $tester tester name
   * @param   array   $args   additional arguments to debug (optional)
   */
  public function printTesterDebug($tester, $args = array())
  {
    ob_start();

    $tester = $this->browser->with($tester);
    call_user_func_array(array($tester, 'debug'), $args);
    $debug = ob_get_contents();

    ob_end_clean();

    $this->printDebug($debug);
  }
}
