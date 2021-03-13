<?php

require __DIR__ . '/vendor/autoload.php';

$config = new PhpCsFixer\Config();

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/tests')
    ->exclude('__snapshots__');

$rules = require __DIR__ . '/.php_cs.rules.php';

// Additional rules for tests
$rules = array_merge(
    $rules,
    [
        'declare_strict_types' => true,
    ]
);

return $config
    ->setFinder($finder)
    ->setRules($rules)
    ->setRiskyAllowed(true)
    ->setCacheFile(__DIR__ . '/.php_cs.tests.cache');
