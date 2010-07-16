<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Feature generating task
 *
 * @package sfBehatPlugin
 * @author  Konstantin Kudryashov <ever.zet@gmail.com>
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

    $featurePath = sfConfig::get('sf_test_dir').'/features/'.$app.'/'.$module.'.feature';

    if (!is_dir($testAppDir))
    {
      throw new sfCommandException(sprintf('The app "%s" features doesn\'t exists. Create features folder with `behat:genereate`', $testAppDir));
    }

    if (is_file($featurePath))
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

    $constants = array(
      'APP_NAME'     => $app,
      'MODULE_NAME'  => $module
    );

    // create basic feature
    $this->getFilesystem()->copy($skeletonDir.'/feature.feature', $featurePath);

    // customize feature file
    $this->getFilesystem()->replaceTokens($featurePath, '##', '##', $constants);
  }
}
