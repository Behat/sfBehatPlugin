<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;

use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

$app = basename(dirname(__DIR__));
require_once __DIR__ . '/../../../../test/bootstrap/functional.php';
require_once 'mink/autoload.php';

/**
 * Features context.
 */
class FeatureContext extends Behat\Mink\Behat\Context\MinkContext
{
    /**
     * {@inheritdoc}
     */
    public function locatePath($path)
    {
        switch ($path) {
            // Define custom path aliases here
            case 'homepage':    $path = '/';
        }

        parent::locatePath($path);
    }
}
