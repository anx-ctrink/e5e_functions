<?php

/** 
 * The following functions test the quota memory and quota storage
 */ 

// Test quota memory by generating a 5 MB string
function func_quota_memory_5_MB($event, $context) 
{
    return func_quota_memory_MB($event, $context, 5);
}

// Test quota memory by generating a 50 MB string
function func_quota_memory_50_MB($event, $context) 
{
    return func_quota_memory_MB($event, $context, 50);
}

// Test quota memory by generating a 90 MB string
function func_quota_memory_90_MB($event, $context) 
{
    return func_quota_memory_MB($event, $context, 90);
}

// Test quota memory by generating a string
function func_quota_memory_MB($event, $context, $iterations)
{
    $message = 'A';
	$iterations = $iterations * 1024 * 1024;
	
    for ($counter = 0; $counter <= $iterations; $counter++) {
        $message .= chr(rand(65,90)); // Random upper char
    }

    echo 'size: ' . strlen($message);

    return [
        'status' => 200,
        'data' => 'OK',
    ];
}

// Test quota storage by generating a 5 MB file
function func_quota_storage_5_MB($event, $context) 
{
    return func_quota_storage_MB($event, $context, 5);
}

// Test quota storage by generating a 50 MB file
function func_quota_storage_50_MB($event, $context) 
{
    return func_quota_storage_MB($event, $context, 50);
}

// Test quota storage by generating a 90 MB file
function func_quota_storage_90_MB($event, $context) 
{
    return func_quota_storage_MB($event, $context, 90);
}

// Test quota storage by generating a file
function func_quota_storage_MB($event, $context, $iterations)
{
	$iterations = $iterations * 1024 * 1024;
    $content = 'This is the new file';
    $this_directory = dirname(dirname(__FILE__));
    $fp = fopen($this_directory . '/../../file.txt', 'a');

    if ($fp) {
        // Open file
        fwrite($fp, $content);
        // Append a string to the file (x times)
        for ($counter = 0; $counter <= $iterations; $counter++) {
            fwrite($fp, 'Append this string to an existing file');
        }
        fclose($fp);
    }

    // Print file size
    echo '/../../file.txt' . ': ' . filesize('/../../file.txt') . ' Byte';

    return [
        'status' => 200,
        'data' => 'OK',
    ];
}
