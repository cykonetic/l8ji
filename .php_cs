<?php

$excluded_folders = [
    'bootstrap',
    'docker',
    'node_modules',
    'storage',
    'vendor',
];

$finder = PhpCsFixer\Finder::create()
    ->exclude($excluded_folders)
    ->notName('AcceptanceTester.php')
    ->notName('FunctionalTester.php')
    ->notName('UnitTester.php')
    ->in(__DIR__);

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony'                          => true,
        'binary_operator_spaces'            => ['align_double_arrow' => true],
        'array_syntax'                      => ['syntax' => 'short'],
        'linebreak_after_opening_tag'       => true,
        'not_operator_with_successor_space' => true,
        'ordered_imports'                   => true,
        'phpdoc_order'                      => true,
    ])
    ->setFinder($finder)
;