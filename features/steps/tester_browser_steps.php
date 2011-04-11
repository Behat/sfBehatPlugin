<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2011 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$steps->Given('/^I am on(?: the)? (.*)$/', function($world, $page) {
    $world->browser->get($world->getPathTo($page));
});

$steps->When('/^I go to(?: the)? (.*)$/', function($world, $page) {
    $world->browser->get($world->getPathTo($page));
});

$steps->When('/^I (?:follow|click)(?: the)? "([^"]*)"(?: link)*$/', function($world, $link) {
    $world->browser->click($link);
});

$steps->When('/^I go back$/', function($world) {
    $world->browser->back();
});

$steps->When('/^I go forward$/', function($world) {
    $world->browser->forward();
});

$steps->When('/^I send post to (.*) with:$/', function($world, $page, $table) {
    $world->browser->post($world->getPathTo($page), $table->getHash());
});

$steps->When('/^I follow redirect$/', function($world) {
    $world->browser->followRedirect();
});
