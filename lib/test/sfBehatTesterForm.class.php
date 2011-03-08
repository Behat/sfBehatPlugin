<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2011 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfBehatTesterForm implements tests for forms submitted by the user.
 *
 * @package    sfBehatPlugin
 * @subpackage test
 * @author     Konstantin Kudryashov <ever.zet@gmail.com>
 */
class sfBehatTesterForm extends sfTesterForm
{
  /**
   * Outputs some debug information about the current submitted form.
   */
  public function debug()
  {
    if (null === $this->form)
    {
      throw new LogicException('no form has been submitted.');
    }

    print $this->tester->error('Form debug');

    print sprintf("Submitted values: %s\n", str_replace("\n", '', var_export($this->form->getTaintedValues(), true)));
    print sprintf("Errors: %s\n", $this->form->getErrorSchema());
  }
}
