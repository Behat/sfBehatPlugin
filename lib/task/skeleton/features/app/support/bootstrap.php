<?php

/*
 * Place your bootstrap scripts here.
 */

require_once 'mink/autoload.php';
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

$app = basename(dirname(__DIR__));
require_once __DIR__ . '/../../../../test/bootstrap/functional.php';
