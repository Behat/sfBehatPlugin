<?php

$this->pathTo = function($page) use($world) {
    switch ($page) {

        // Define custom path aliases here

        case 'homepage':
          return '/';

        default: $page;
    }
};
