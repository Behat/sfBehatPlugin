<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2011 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Feature generating task
 *
 * @package     sfBehatPlugin
 * @author      Konstantin Kudryashov <ever.zet@gmail.com>
 */
class behatGenerateFeatureTask extends sfBaseTask
{
  protected function configure()
  {
    $this->addArguments(array(
      new sfCommandArgument('application', sfCommandArgument::REQUIRED, 'The application name'),
      new sfCommandArgument('module', sfCommandArgument::REQUIRED, 'The module name')
    ));

    $this->namespace        = 'behat';
    $this->name             = 'generate-feature';
    $this->briefDescription = 'Generates feature';
    $this->detailedDescription = <<<EOF
The [behat:generate-feature|INFO] task generates feature for specific module.
Call it with:

  [php symfony behat:generate-feature|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    $app    = $arguments['application'];
    $module = $arguments['module'];

    $featuresPath   = sfConfig::get('sf_test_dir') . '/features/' . $app;
    $feature        = $featuresPath . '/' . $module.'.feature';

    if (!is_dir($featuresPath))
    {
      throw new sfCommandException(sprintf('The app "%s" features doesn\'t exists. Create features folder with `behat:genereate`', $featuresPath));
    }

    if (is_file($feature))
    {
      throw new sfCommandException(sprintf('The feature "%s" already exists in app.', $module, $app));
    }

    if (is_readable(sfConfig::get('sf_data_dir').'/skeleton/feature'))
    {
      $skeletonDir = sfConfig::get('sf_data_dir').'/skeleton/feature';
    }
    else
    {
      $skeletonDir = dirname(__FILE__).'/skeleton/feature';
    }

    // create basic feature
    $this->getFilesystem()->copy($skeletonDir.'/feature.feature', $feature);

    // customize feature file
    $this->getFilesystem()->replaceTokens($feature, '##', '##', array(
      'APP_NAME'     => $app,
      'MODULE_NAME'  => $module
    ));
  }
}

