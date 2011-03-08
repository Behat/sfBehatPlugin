<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2011 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$steps->Then('/^Request parameter "([^"]*)" is "([^"]*)"$/', function($world, $key, $val) {
    $world->browser->with('request')->isParameter($key, $val);
});

$steps->Then('/^Request format is (.*)$/', function($world, $format) {
    $world->browser->with('request')->isFormat($format);
});

$steps->Then('/^Request method is (.*)$/', function($world, $method) {
    $world->browser->with('request')->isMethod($format);
});

$steps->Then('/^Request has cookie "([^"]*)"$/', function($world, $cookie) {
    $world->browser->with('request')->hasCookie($cookie);
});

$steps->Then('/^Request has not cookie "([^"]*)"$/', function($world, $cookie) {
    $world->browser->with('request')->hasCookie($cookie, false);
});

$steps->Then('/^Request cookie "([^"]*)" is "([^"]*)"$/', function($world, $cookie, $val) {
    $world->browser->with('request')->isCookie($cookie, $val);
});
