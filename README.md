# sfBehatPlugin #

*Cucumber-style BDD in symfony.*

sfBehatPlugin is a plugin for symfony applications. It help to write Cucumber-like Behat features to test symfony applications.

## Prerequisites ##

1. Behat is written on PHP 5.3, so you need PHP 5.3.2 to run your features;
2. Behat itself. Installation instruction and documentation are on [http://behat.org](http://behat.org);
3. Mink. (`pear install behat/mink-demo`);
4. You need PHPUnit 3.5.0 to be available in your PATH.

## Installation ##

### Using git clone ###

Use this to install as a plugin in a symfony app:

``` bash
$> cd plugins && git clone git://github.com/Behat/sfBehatPlugin.git
```

### Using git submodules ###

Use this if you prefer to use git submodules for plugins:

``` bash
$> git submodule add git://github.com/Behat/sfBehatPlugin.git plugins/sfBehatPlugin
```

and enable plugin in your ProjectConfigurations class.

## Usage ##

### Prepare ###

After installation, you need to create features folders for your applications inside symfony's `test` folder. To do this, simply run:

``` bash
$> symfony behat:setup frontend
```

where `frontend` is your application name.

### Generate Features ###

To begin with Behat, you need to create your first feature file. Run:

``` bash
$> symfony behat:generate-feature frontend main
```

where `frontend` & `main` is your application & module names to test

### Run Features ###

You can either run all app tests with:

``` bash
$> behat test/features/frontend
```

or specific feature with:

``` bash
$> behat test/features/frontend/main.feature
```

or all frontend features with simply:

``` bash
$> behat
```

sfBehatPlugin installs `behat.yml` into your project root. This is a Behat configuration file for sf environment. So, if
you want to run your symfony features from different directory - specify configuration path manually with
(-c|--configuration option) like that:

``` bash
$> behat -c ../behat.yml
```

## Write Features ##

### Write New Steps ###

You can create new steps simply by placing definitions in any `*.php` file under `steps/` folder in your app features.

### Specify App Routes ###

sfBehatPlugin has base steps to run over your application. One of them is `/^I am on(?: the)? (.*)$/`. This step tries to load specified page as is, but you can specify path manually in `support/paths.php`:

``` php
<?php
// ...
$this->getPathTo = function($page) use($world) {
    switch ($page) {
        case 'homepage':        return '/';
        case 'articles list':   return '/articles';
        default:                $page;
    }
};
```

## Contributors ##

* everzet (lead): [http://github.com/everzet](http://github.com/everzet)

Behat is maintained by ever.zet [http://github.com/everzet](http://github.com/everzet)
Behat is sponsored knpLabs [http://www.knplabs.com/en](http://www.knplabs.com/en)
