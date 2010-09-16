<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$steps->When('/^I fill in "([^"]*)" with "([^"]*)"$/', function($world, $field, $value) {
    $world->form_parameters[$field] = $value;
});

$steps->When('/^I select "([^"]*)" from "([^"]*)"$/', function($world, $value, $field) {
    $world->form_parameters[$field] = $value;
});

$steps->When('/^I check "([^"]*)"$/', function($world, $field) {
    $world->form_parameters[$field] = true;
});

$steps->When('/^I uncheck "([^"]*)"$/', function($world, $field) {
    $world->form_parameters[$field] = false;
});

$steps->When('/^I attach the file at "([^"]*)" to "([^"]*)"$/', function($world, $path, $field) {
    $world->form_parameters[$field] = $path;
});

$steps->When('/^I press "([^"]*)" in (.*) form$/', function($world, $button, $form) {
    $world->browser->click($button, array($form => $world->form_parameters), array('_with_csrf' => true));
    $world->form_parameters = array();
});

$steps->Then('/^the form should have (\d+) errors$/', function($world, $error_count) {
    $world->form->initialize();
    $world->form->hasErrors(intval($error_count));
});

$steps->Then('/^the field "([^"]*)" should have the error "([^"]*)"$/', function($world, $field, $error) {
    $world->form->initialize();
    $world->form->isError($field, $error);
});