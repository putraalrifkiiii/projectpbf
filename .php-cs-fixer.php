<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__);

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(false)
    ->setRules([
        '@PSR12' => true,

        'braces_position' => [
            'classes_opening_brace' => 'next_line_unless_newline_at_signature_end',
            'functions_opening_brace' => 'next_line_unless_newline_at_signature_end',
            'anonymous_functions_opening_brace' => 'same_line',
        ],

        'array_syntax' => ['syntax' => 'short'],
        'single_quote' => true,
        'no_unused_imports' => true,

        'binary_operator_spaces' => [
            'default' => 'single_space'
        ],
    ])
    ->setFinder($finder);
