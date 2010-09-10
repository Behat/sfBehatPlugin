<?php

$this->bootstrap = function() use($world) {
    static $coreLoaded;

    if (!$coreLoaded) {
        $app = basename(dirname(__DIR__));
        include(__DIR__ . '/../../../bootstrap/functional.php');
        $coreLoaded = true;
    }

    include(sfConfig::get('sf_plugins_dir') . '/sfBehatPlugin/lib/support/sfBehatEnvironment.php');
    include('paths.php');
};

$this->bootstrap();
