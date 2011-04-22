<?php

/**
 * Configure Mink routes generation here
 */

$world->getPathTo = function($path) use($world) {
    switch ($path) {
        // Define custom path aliases here
        case 'homepage':    $path = '/';
    }

    return 0 !== strpos('http', $path) ? $world->getParameter('start_url') . $path : $path;
};
