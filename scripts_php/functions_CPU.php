<?php

/* 
* The following functions test the CPU (quota cpu) 
*/ 

// Test CPU by multiplying 100 times 
function func_multiply_100($event, $context) {
    $number = 2;
    for ($counter = 0; $counter <= 100; $counter++) {
        $number += rand ( 1, 999 );
      }
    return [
        'data' => 'Hello world!',
    ];
}

// Test CPU by multiplying 100.000 times 
function func_multiply_100000($event, $context) {
    $number = 2;

    for ($counter = 0; $counter <= 100000; $counter++) {
        $number += rand ( 1, 999 );
      }
    return [
        'data' => 'Hello world!',
    ];
}

// Test CPU by multiplying 1.000.000 times
function func_multiply_1000000($event, $context) {
    $number = 2;

    for ($counter = 0; $counter <= 1000000; $counter++) {
        $number += rand ( 1, 999 );
      }
    return [
        'data' => 'Hello world!',
    ];
}

?>