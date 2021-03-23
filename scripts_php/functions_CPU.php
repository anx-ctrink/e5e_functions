<?php

/** 
 * The following functions test the CPU (quota cpu) 
 */ 
 
// Test CPU by multiplying 100 times 
function func_multiply_100($event, $context)
{
    return func_multiply($event, $context, 100);
}

// Test CPU by multiplying 100.000 times 
function func_multiply_100000($event, $context)
{
    return func_multiply($event, $context, 100000);
}

// Test CPU by multiplying 1.000.000 times
function func_multiply_1000000($event, $context)
{
    return func_multiply($event, $context, 1000000);
}

// Test CPU by multiplying
function func_multiply($event, $context, $iterations)
{
    $number = 2;

    for ($counter = 0; $counter <= $iterations; $counter++) {
        $number *= rand(1, 999);
    }

    return [
        'status' => 200,
        'data' => 'OK',
    ];
}
