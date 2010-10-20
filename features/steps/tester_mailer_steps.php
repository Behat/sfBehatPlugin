<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$steps->Then('/^Mail has sent$/', function($world) {
    $world->browser->with('mailer')->hasSent();
});

$steps->Then('/^(\d+) mails was sent$/', function($world, $count) {
    $world->browser->with('mailer')->hasSent($count);
});

$steps->Then('/^Mail to "([^"]*)" was sent with:$/', function($world, $to, $pystring) {
    $world->browser->with('mailer')->
        withMessage($to)->
        checkBody((string) $pystring);
});

$steps->Then('/^"([^"]*)" header in "([^"]*)" mail was set to "([^"]*)"$/', function($world, $key, $to, $val) {
    $world->browser->with('mailer')->
        withMessage($to)->
        checkHeader($key, $val);
});

$steps->Then('/^Print mailer debug$/', function($world) {
    $world->printTesterDebug('mailer');
});
