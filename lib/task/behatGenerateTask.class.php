<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Features folder generator task
 *
 * @package sfBehatPlugin
 * @author  Konstantin Kudryashov <ever.zet@gmail.com>
 */
class behatGenerateTask extends sfBaseTask
{
  protected function configure()
  {
    $this->addArguments(array(
      new sfCommandArgument('application', sfCommandArgument::REQUIRED, 'The application name'),
    ));

    $this->addOptions(array(
      new sfCommandOption('override', null, sfCommandOption::PARAMETER_NONE, 'Overwrite old files with new'),
    ));

    $this->namespace        = 'behat';
    $this->name             = 'generate';
    $this->briefDescription = 'Generates features folder';
    $this->detailedDescription = <<<EOF
The [behat:generate|INFO] task generates features folder for specific app.
Call it with:

  [php symfony behat:generate|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    $app = $arguments['application'];
    $override = $options['override'];

    $testAppDir = sfConfig::get('sf_test_dir').'/features/'.$app;

    if (is_readable(sfConfig::get('sf_data_dir').'/skeleton/features'))
    {
      $skeletonDir = sfConfig::get('sf_data_dir').'/skeleton/features';
    }
    else
    {
      $skeletonDir = dirname(__FILE__).'/skeleton/features';
    }

    // create basic application features
    $finder = sfFinder::type('any')->discard('.sf');
    $this->getFilesystem()->mirror($skeletonDir.'/app', $testAppDir, $finder, array(
      'override' => $override
    ));
    $this->getFilesystem()->mirror($skeletonDir.'/root', sfConfig::get('sf_root_dir'), $finder, array(
      'override' => $override
    ));
  }
}
