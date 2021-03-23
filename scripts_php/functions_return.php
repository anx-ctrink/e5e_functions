<?php

/** 
 * The following functions test the behavior for unexpected prints or return values
 */ 

// Simple function which returns an ASCII string
function func_return_ASCII($event, $context) 
{
    $ascii_string = 'text';

    return [
        'status' => 200,
        'data' => $ascii_string,
    ];
}

// Simple function which prints an ASCII string
function func_print_ASCII($event, $context) 
{
    $ascii_string = 'text';
	echo $ascii_string; 
	
    return [
        'status' => 200,
        'data' => 'OK',
    ];
}

// Simple function which returns utf 8 data
function func_return_utf8($event, $context)
{
	$utf8_string = '奥地利';
	
	return [
        'status' => 200,
        'data' => $utf8_string,
    ];
}

// Simple function which prints utf 8 data
function func_print_utf8($event, $context)
{
	$utf8_string = '奥地利';
	echo $utf8_string;
	
	return [
        'status' => 200,
        'data' => 'OK',
    ];
}

// Simple function which returns utf 16 data
function func_return_utf16($event, $context)
{
	$utf8_string = '奥地利';
	
	return [
        'status' => 200,
        'data' => mb_convert_encoding($utf8_string,'UTF-16'),
    ];
}

// Simple function which prints utf 16 data
function func_print_utf16($event, $context)
{
	$utf8_string = '奥地利';
	echo mb_convert_encoding($utf8_string,'UTF-16');
	
	return [
        'status' => 200,
        'data' => 'OK',
    ];
}

// Simple function which prints a string about 0.5 MB
function func_print_0_5_MB($event, $context)
{
    return func_print_MB($event, $context, 530000);
} 

// Simple function which prints a string about 5 MB
function func_print_5_MB($event, $context)
{
    return func_print_MB($event, $context, 5300000);
} 

// Simple function which prints a string about 50 MB
function func_print_50_MB($event, $context)
{
    return func_print_MB($event, $context, 53000000);
} 

// Simple function which prints a string about 500 MB
function func_print_500_MB($event, $context)
{
    return func_print_MB($event, $context, 530000000);
}

// Simple function which prints a string
function func_print_MB($event, $context, $iterations)
{
    $message = 'A';

    // Append a random upper letter
    for ($counter = 0; $counter <= $iterations; $counter++) {
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
    return func_return_MB($event, $context, 53000000);
}

// Simple function which returns a string about 500 MB
function func_return_500_MB($event, $context)
{
    return func_return_MB($event, $context, 530000000);
}

// Simple function which returns a string
function func_return_MB($event, $context, $iterations)
{
    $message = 'A';

    // Append a random upper letter
    for ($counter = 0; $counter <= $iterations; $counter++) {
        $message .= chr(rand(65,90));
    }

    return [
        'status' => 200,
        'data' => $message,
    ];
}
