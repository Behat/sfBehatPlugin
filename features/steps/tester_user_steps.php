<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2011 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$steps->Then('/^User attribute "([^"]*)" is "([^"]*)"$/', function($world, $key, $val) {
    $world->browser->with('user')->isAttribute($key, $val);
});

$steps->Then('/^Flash "([^"]*)" is "([^"]*)"$/', function($world, $key, $val) {
    $world->browser->with('user')->isFlash($key, $val);
});

$steps->Then('/^User culture is "([^"]*)"$/', function($world, $culture) {
    $world->browser->with('user')->isCulture($culture);
});

$steps->Then('/^User is authenticated$/', function($world) {
    $world->browser->with('user')->isAuthenticated();
});

$steps->Then('/^User is not authenticated$/', function($world) {
    $world->browser->with('user')->isAuthenticated(false);
});

$steps->Then('/^User has credential "([^"]*)"$/', function($world, $credential) {
    $world->browser->with('user')->hasCredential($credential);
});

$steps->Then('/^User has not credential "([^"]*)"$/', function($world, $credential) {
    $world->browser->with('user')->hasCredential($credential, false);
});
