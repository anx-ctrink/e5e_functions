<?php

/** 
 * The following functions test the quota time
 */ 

// Simple function which waits / sleeps 10 seconds
function func_sleep_10($event, $context) 
{
    sleep(10);
    return [
        'status' => 200,
        'data' => 'OK',
    ];
}

// Simple function which waits / sleeps 10 seconds
function func_sleep_100($event, $context) 
{
    sleep(100);
    return [
        'status' => 200,
        'data' => 'OK',
    ];
}

// Function which waits / sleeps for 20 seconds   
function sub_func_sleep_10($event, $context) 
{
    echo 'Starting Subfunction which sleeps 10 seconds';
    sleep(10);
    echo 'Exiting Subfunction after 10 seconds';
}

// Function which waits / sleeps for 20 seconds   
function sub_func_sleep_20($event, $context) 
{
    echo 'Starting Subfunction which sleeps 10 seconds';
    sleep(20);
    echo 'Exiting Subfunction after 20 seconds';
}

// Function which waits / sleeps for 30 seconds   
function sub_func_sleep_30($event, $context) 
{
    echo 'Starting Subfunction which sleeps 10 seconds';
    sleep(30);
    echo 'Exiting Subfunction after 30 seconds';
}

// Function which uses exec to reach a timeout
function func_sleep_exec($event, $context)
{
    exec('(sleep 15m)');
}
?>
