<?php

/** 
 * The following functions test the quota memory and quota storage
 */ 

// Test quota memory by generating a 5 MB string
function func_quota_memory_5_MB($event, $context) 
{
    $message = 'A';

    for ($counter = 0; $counter <= 650; $counter++) {
        $message .= chr(rand(65,90)); // Random upper char
      }

    return [
        'status' => 200,
        'data' => 'OK',
    ];
}

// Test quota memory by generating a 90 MB string
function func_quota_memory_50_MB($event, $context) 
{
    $message = 'A';

    for ($counter = 0; $counter <= 6000000; $counter++) {
        $message .= chr(rand(65,90)); // Random upper char
      }

      echo('size: ' + strlen($message));

    return [
        'status' => 200,
        'data' => 'OK',
    ];
}


// Test quota memory by generating a 90 MB string
function func_quota_memory_90_MB($event, $context) 
{
    $message = 'A';

    for ($counter = 0; $counter <= 10000000; $counter++) {
        $message .= chr(rand(65,90)); // Random upper char
      }

      echo('size: ' + strlen($message));

    return [
        'status' => 200,
        'data' => 'OK',
    ];
}

// Test quota storage by generating a 5 MB file
function func_quota_storage_5_MB($event, $context) 
{
    $content = 'This is the new file';
    $this_directory = dirname(dirname(__FILE__));
    $fp = fopen($this_directory . '/../../file.txt', 'a');
    if ($fp) {
        // Open file
        fwrite($fp, $content); 
        // Append a string to the file (600000 times)
        for ($counter = 0; $counter <= 600000; $counter++) {
            fwrite($fp, 'Append this string to an existing file'); 
        }
        fclose($fp);
    }

    // Print the size of the file
    echo '/../../file.txt' . ': ' . filesize('/../../file.txt') . ' Byte';

    return [
        'status' => 200,
        'data' => 'OK',
    ];
}

// Test quota storage by generating a 50 MB file
function func_quota_storage_50_MB($event, $context) 
{
    $content = 'This is the new file';
    $this_directory = dirname(dirname(__FILE__));
    $fp = fopen($this_directory . '/../../file.txt', 'a');
    if ($fp) {
        // Open file
        fwrite($fp, $content); 
        // Append a string to the file (600000 times)
        for ($counter = 0; $counter <= 6000000; $counter++) {
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

// Test quota storage by generating a 90 MB file
function func_quota_storage_90_MB($event, $context) 
{
    $content = 'This is the new file';
    $this_directory = dirname(dirname(__FILE__));
    $fp = fopen($this_directory . '/../../file.txt', 'a');
    if ($fp) {
        // Open file
        fwrite($fp, $content); 
        // Append a string to the file (600000 times)
        for ($counter = 0; $counter <= 10000000; $counter++) {
            fwrite($fp, 'Append this string to an existing file'); 
        }
        fclose($fp);
    }

    echo '/../../file.txt' . ': ' . filesize('/../../file.txt') . ' Byte';

    return [
        'status' => 200,
        'data' => 'OK',
    ];
}

?>
