<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$steps->Then('/^Page is cached$/', function($world) {
    $world->browser->with('cache')->isCached();
});

$steps->Then('/^Page is not cached$/', function($world) {
    $world->browser->with('cache')->isCached(false);
});

$steps->Then('/^Page (.*) is cached$/', function($world, $page) {
    $world->browser->with('cache')->isUriCached($world->pathTo($page));
});

$steps->Then('/^Page (.*) is not cached$/', function($world, $page) {
    $world->browser->with('cache')->isUriCached($world->pathTo($page), false);
});
