<?php

require __DIR__ . '/vendor/autoload.php';

$config = new PhpCsFixer\Config();

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude('tests');

$rules = require __DIR__ . '/.php_cs.rules.php';

return $config
    ->setRules($rules)
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setCacheFile(__DIR__ . '/.php_cs.cache');
