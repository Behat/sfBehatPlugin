# sfBehatPlugin #

*Cucumber-style BDD in symfony.*

sfBehatPlugin is a plugin for symfony applications. It help to write Cucumber-like Behat features to test symfony applications.

## Requirements:

You need a valid PHPUnit 3.6 installation:

``` bash
pear channel-discover pear.phpunit.de
pear channel-discover components.ez.no
pear channel-discover pear.symfony-project.com

pear install phpunit/PHPUnit
```

And of course, you need to install Behat and Mink:

``` bash
pear channel-discover pear.behat.org

pear install behat/behat
pear install behat/mink-beta
```

Also, you need to install Sahi if you want to test your website in a real browser.  
Download the Sahi jar from the [http://sahi.co.in/w/](Sahi website)

## Installation ##

### Using git clone ###

Use this to install as a plugin in a symfony app:

``` bash
cd plugins && git clone git://github.com/Behat/sfBehatPlugin.git
```

### Using git submodules ###

Use this if you prefer to use git submodules for plugins:

``` bash
git submodule add git://github.com/Behat/sfBehatPlugin.git plugins/sfBehatPlugin
```

and enable plugin in your ProjectConfigurations class.

## Usage ##

### Prepare ###

After installation, you need to create features folders for your applications inside symfony's `test` folder. To do this, simply run:

``` bash
symfony behat:setup frontend
```

where `frontend` is your application name.

### Generate Features ###

To begin with Behat, you need to create your first feature file. Run:

``` bash
symfony behat:generate-feature frontend main
```

where `frontend` & `main` is your application & module names to test

### Run Features ###

You can either run all app tests with:

``` bash
behat test/features/frontend
```

or specific feature with:

``` bash
behat test/features/frontend/main.feature
```

or all frontend features with simply:

``` bash
behat
```

sfBehatPlugin installs `behat.yml` into your project root. This is a Behat configuration file for sf environment. So, if
you want to run your symfony features from different directory - specify configuration path manually with
(-c|--configuration option) like that:

``` bash
behat -c ../behat.yml
```

## Write Features ##

### Write New Steps ###

You can create new steps simply by placing definitions in any `*.php` file under `steps/` folder in your app features.

### Specify App Routes ###

Behat+Mink provides base steps to run over your application. One of them is `/^I am on (.+)$/`. This step tries to load specified page as is, but you can specify path manually in `support/paths.php`:

``` php
<?php
// ...
$this->getPathTo = function($page) use($world) {
   $startUrl = rtrim($world->getParameter('start_url'), '/') . '/';

   switch ($path) {
       // Define custom path aliases here
       case 'homepage':       $path = '/';
       case 'articles list':  $path = '/articles';
       case 'news list':      $path = '/news';
   }

   return 0 !== strpos('http', $path) ? $startUrl . ltrim($path, '/') : $path;
};
```

You can list all available steps with:

``` bash
behat --steps --lang en
```

## Contributors ##

* everzet (lead): [http://github.com/everzet](http://github.com/everzet)

Behat is maintained by ever.zet [http://github.com/everzet](http://github.com/everzet)
Behat is sponsored knpLabs [http://www.knplabs.com/en](http://www.knplabs.com/en)
