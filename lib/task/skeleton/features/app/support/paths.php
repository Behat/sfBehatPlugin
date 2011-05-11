<?php

/**
 * Configure Mink routes generation here
 */

$world->getPathTo = function($path) use($world) {
   $startUrl = rtrim($world->getParameter('start_url'), '/') . '/';

   switch ($path) {
       // Define custom path aliases here
       case 'homepage':    $path = '/';
   }

   return 0 !== strpos('http', $path) ? $startUrl . ltrim($path, '/') : $path;
};
