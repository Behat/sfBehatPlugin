# sfBehatPlugin #

*Cucumber-style BDD in symfony.*

sfBehatPlugin is a plugin for symfony applications. It help to write Cucumber-like Behat features to test symfony applications.

## Prerequisites ##

1. Behat is written on PHP 5.3, so you need PHP 5.3.2 to run your features;
2. You need Behat itself. Installation instruction is at [http://everzet.com/Behat](http://everzet.com/Behat);
3. You need PHPUnit to be available in your PATH.

## Installation ##

### Using symfony:plugin ###

Use this to install as a plugin in a symfony app:

	$ symfony plugin:install sfBehatPlugin

### Using git clone ###

Use this to install as a plugin in a symfony app:

	$ cd plugins && git clone git://github.com/everzet/sfBehatPlugin.git

### Using git submodules ###

Use this if you prefer to use git submodules for plugins:

	$ git submodule add git://github.com/everzet/sfBehatPlugin.git plugins/sfBehatPlugin

and enable plugin in your ProjectConfigurations class.

## Usage ##

### Prepare ###

After installation, you need to create features folders for your applications inside symfony's `test` folder. To do this, simply run:

	symfony behat:init frontend

where `frontend` is your application name.

### Generate Features ###

To begin with Behat, you need to create your first feature file. Run:

	symfony behat:generate-feature frontend main

where `frontend` & `main` is your application & module names to test

### Run Features ###

You can either run all app tests with:

	behat test/features/frontend

or specific feature with:

	behat test/features/frontend/main.feature

or all frontend features with simply:

	behat

## Write Features ##

### Write New Steps ###

You can create new steps simply by placing definitions in any `*.php` file under `steps/` folder in your app features.

### Specify App Routes ###

sfBehatPlugin has base steps to run over your application. One of them is `/^I am on(?: the)? (.*)$/`. This step tries to load specified page as is, but you can specify path manually in `support/paths.php`:

	<?php
	$this->pathTo = function($page) use($world) {
	    switch ($page) {
	        case 'homepage':        return '/';
	        case 'articles list':   return '/articles';
	        default:                $page;
	    }
	};

## Contributors ##

* everzet (lead): [http://github.com/everzet](http://github.com/everzet)

Behat is maintained by ever.zet [http://github.com/everzet](http://github.com/everzet)