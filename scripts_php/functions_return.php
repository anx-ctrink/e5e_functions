<?php

/** 
 * The following functions test the behavior for unexpected prints or return values
 */ 

// Simple function which returns 'bla'
function func_return_ASCII($event, $context) 
{
    $message = "This is the Euro symbol '€'.";
    #echo iconv("UTF-8", "ASCII", $message), PHP_EOL;

    return [
        'status' => 200,
        'data' => iconv("UTF-8", "ASCII", $message), PHP_EOL,
    ];
}

// Simple function which returns non utf data
function func_return_utf8($event, $context)
{
    $message = "This is the Euro symbol '€'.";
    
    return [
        'status' => 200,
        'data' => iconv("ASCII", "UTF-8", $message), PHP_EOL,
    ];
}

// Simple function which prints non utf data
function func_print_non_utf8($event, $context)
{
    $message = 'AB\xfc';
    print($message);

    return [
        'status' => 200,
        'data' => 'OK',
    ];
} 

// Simple function which prints a string about 0.5 MB
function func_print_0_5_MB($event, $context)
{
    $message = 'A';

    // Append a random upper letter
    for ($counter = 0; $counter <= 60000; $counter++) {
        $message .= chr(rand(65,90));; 
      }
    
    print($message);
    return [
        'status' => 200,
        'data' => 'OK',
    ];
} 

// Simple function which prints a string about 5 MB
function func_print_5_MB($event, $context)
{
    $message = 'A';

    // Append a random upper letter
    for ($counter = 0; $counter <= 600000; $counter++) {
        $message .= chr(rand(65,90));; 
      }
    
    print($message);
    return [
        'status' => 200,
        'data' => 'OK',
    ];
} 

// Simple function which prints a string about 50 MB
function func_print_50_MB($event, $context)
{
    $message = 'A';

    // Append a random upper letter
    for ($counter = 0; $counter <= 6000000; $counter++) {
        $message .= chr(rand(65,90));; 
      }
    
    print($message);
    return [
        'status' => 200,
        'data' => 'OK',
    ];
} 

// Simple function which prints a string about 500 MB
function func_print_500_MB($event, $context)
{
    $message = 'A';

    // Append a random upper letter
    for ($counter = 0; $counter <= 60000000; $counter++) {
        $message .= chr(rand(65,90));; 
      }
    
    print($message);
    return [
        'status' => 200,
        'data' => 'OK',
    ];
} 

// Simple function which returns a string about 50 MB
function func_return_50_MB($event, $context)
{
    $message = 'A';

    // Append a random upper letter
    for ($counter = 0; $counter <= 6000000; $counter++) {
        $message .= chr(rand(65,90));; 
      }
    
    return [
        'status' => 200,
        'data' => $message,
    ];
} 

// Simple function which returns a string about 500 MB
function func_return_500_MB($event, $context)
{
    $message = 'A';

    // Append a random upper letter
    for ($counter = 0; $counter <= 60000000; $counter++) {
        $message .= chr(rand(65,90));; 
      }
    
    return [
        'status' => 200,
        'data' => $message,
    ];
} 
?>
