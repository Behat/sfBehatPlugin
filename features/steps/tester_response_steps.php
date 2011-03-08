<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2011 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$steps->Then('/^Response status code is (\d+)$/', function($world, $code) {
    $world->browser->with('response')->isStatusCode(intval($code));
});

$steps->Then('/^I should see "([^"]*)"$/', function($world, $text) {
    $world->browser->with('response')->matches('/'.$text.'/');
});

$steps->Then('/^I should not see "([^"]*)"$/', function($world, $text) {
    $world->browser->with('response')->matches('/(?!'.$text.')/');
});

$steps->Then('/^I should see element "([^"]*)"$/', function($world, $css) {
    $world->browser->with('response')->checkElement($css);
});

$steps->Then('/^Header "([^"]*)" is set to "([^"]*)"$/', function($world, $key, $value) {
    $world->browser->with('response')->isHeader($key, $value);
});

$steps->Then('/^Header "([^"]*)" is not set to "([^"]*)"$/', function($world, $key, $value) {
    $world->browser->with('response')->isHeader($key, '!'.$value);
});

$steps->Then('/^Cookie "([^"]*)" was set$/', function($world, $name) {
    $world->browser->with('response')->setsCookie($name);
});

$steps->Then('/^Cookie "([^"]*)" was set to "([^"]*)"$/', function($world, $name, $value) {
    $world->browser->with('response')->setsCookie($name, $value);
});

$steps->Then('/^Cookie "([^"]*)" was not set to "([^"]*)"$/', function($world, $name, $value) {
    $cookies = $world->response->getCookies();
    $world->browser->test()->isnt($cookies[$name], $value);
});

$steps->Then('/^I was redirected$/', function($world) {
    $world->browser->with('response')->isRedirected(true);
});

$steps->Then('/^I was not redirected$/', function($world) {
    $world->browser->with('response')->isRedirected(false);
});

$steps->Then('/^Print debug$/', function($world) {
    $world->printTesterDebug('response');
});

$steps->Then('/^Print output$/', function($world) {
    $world->printTesterDebug('response', array(true));
});
