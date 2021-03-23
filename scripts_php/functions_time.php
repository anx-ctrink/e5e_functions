<?php

/** 
 * The following functions test the quota time
 */ 

// Simple function which waits / sleeps 10 seconds
function func_sleep_10($event, $context) 
{
    return func_sleep($event, $context, 10);
}

// Simple function which waits / sleeps 100 seconds
function func_sleep_100($event, $context) 
{
    return func_sleep($event, $context, 100);
}

// Simple function which waits / sleeps
function func_sleep($event, $context, $seconds)
{
    sleep($seconds);

    return [
        'status' => 200,
        'data' => 'OK',
    ];
}

// Function which waits / sleeps for 10 seconds
function sub_func_sleep_10($event, $context) 
{
    sub_func_sleep($event, $context, 10);
}

// Function which waits / sleeps for 20 seconds   
function sub_func_sleep_20($event, $context) 
{
    sub_func_sleep($event, $context, 20);
}

// Function which waits / sleeps for 30 seconds   
function sub_func_sleep_30($event, $context) 
{
    sub_func_sleep($event, $context, 30);
}

// Function which waits / sleeps for
function sub_func_sleep($event, $context, $seconds)
{
    echo 'Starting subfunction which sleeps ' . $seconds . ' seconds';
    sleep($seconds);
    echo 'Exiting subfunction after ' . $seconds . ' seconds';
}

// Function which uses exec to sleep
function func_sleep_exec($event, $context)
{
    exec('(sleep 15m)');
}
