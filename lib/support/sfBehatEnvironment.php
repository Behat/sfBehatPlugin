<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

// Require PHPUnit assertions
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

// Hide lime output
require_once sfConfig::get('sf_symfony_lib_dir') . '/vendor/lime/lime.php';
require_once __DIR__ . '/../lime/sfBehatLimeNoOutput.class.php';

// Init site browser
$tester = new lime_test(null, array('output' => new sfBehatLimeNoOutput()));
$this->browser = new sfTestFunctional(new sfBrowser(), $tester);

// Helpful closures
$this->getRequest = function() use($world) {
    return $world->browser->getRequest();
};
$this->getContext = function() use($world) {
    return $world->browser->getContext();
};
$this->getResponse = function() use($world) {
    return $world->browser->getResponse();
};

$this->guessPath = function($page) use($world) {
    $routes = $world->getContext()->getRouting()->getRoutes();
    $route = strtolower(strtr($page, array(' ' => '_')));

    if (array_key_exists($route, $routes)) {
        return strtr($routes[$route]->getPattern(), array(':sf_format' => 'html'));
    } else {
        return $world->pathTo($page);
    }
};
