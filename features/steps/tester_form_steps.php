<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$steps->When('/^I fill in "([^"]*)" with "([^"]*)"$/', function($world, $field, $value) {
    $world->form[$field] = $value;
});

$steps->When('/^I select "([^"]*)" from "([^"]*)"$/', function($world, $value, $field) {
    $world->form[$field] = $value;
});

$steps->When('/^I check "([^"]*)"$/', function($world, $field) {
    $world->form[$field] = true;
});

$steps->When('/^I uncheck "([^"]*)"$/', function($world, $field) {
    $world->form[$field] = false;
});

$steps->When('/^I attach the file at "([^"]*)" to "([^"]*)"$/', function($world, $path, $field) {
    $world->form[$field] = $path;
});

$steps->When('/^I press "([^"]*)" in (.*) form$/', function($world, $button, $form) {
    $world->browser->click($button, array($form => $world->form), array('_with_csrf' => true));
    $world->form = array();
});
