<?php

namespace GildedRose;

use GildedRose\Output;
use Laminas\Config\Factory;

/**
 *  Refactored php GildedRose
 */

require 'vendor/autoload.php';

//Load configuration settings from config.json
$config = Factory::fromFile('config.json');

// Load transaction type class name from config.json
$className = $config['file']['class'];

// use strategy patten for context retrieved from config.json
$output = new Output(new $className());


// generating output into console
$output->display($config['file']['name']);