<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2011 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$steps->When('/^I fill in "([^"]*)" with "([^"]*)"$/', function($world, $field, $value) {
    $world->inputFields[$field] = $value;
});

$steps->When('/^I select "([^"]*)" from "([^"]*)"$/', function($world, $value, $field) {
    $world->inputFields[$field] = $value;
});

$steps->When('/^I check "([^"]*)"$/', function($world, $field) {
    $world->inputFields[$field] = true;
});

$steps->When('/^I uncheck "([^"]*)"$/', function($world, $field) {
    $world->inputFields[$field] = false;
});

$steps->When('/^I attach the file at "([^"]*)" to "([^"]*)"$/', function($world, $path, $field) {
    $world->inputFields[$field] = $path;
});

$steps->When('/^I press "([^"]*)" in (.*) form$/', function($world, $button, $form) {
    $world->browser->click(
        $button, array($form => $world->inputFields), array('_with_csrf' => true)
    );
    $world->inputFields = array();
});

$steps->Then('/^The form should have (\d+) errors$/', function($world, $errorsCount) {
    $world->browser->with('form')->hasErrors(intval($errorsCount));
});

$steps->Then('/^The field "([^"]*)" should have the "([^"]*)" error$/', function($world, $field, $error) {
    $world->browser->with('form')->isError($field, $error);
});

$steps->Then('/^Print form debug$/', function($world) {
    $world->printTesterDebug('form');
});
