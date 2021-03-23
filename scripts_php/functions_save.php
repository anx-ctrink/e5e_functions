<?php

/** 
 * The following functions test the read and write rights 
 */ 

// Create file in current directory 'func_code' (read-only)
function func_save_textfile_func_code($event, $context) 
{
    return func_save_textfile($event, $context, '/file.txt');
}

// Create file in subdirectory of 'func_code' (read-only)
function func_save_textfile_func_code_subfolder($event, $context) 
{
    return func_save_textfile($event, $context, '/test/file.txt');
}

// Create file one folder above 'func_code' (read and write) 
function func_save_textfile_above($event, $context) 
{
    return func_save_textfile($event, $context, '/../../file.txt');
}

// Create file
function func_save_textfile($event, $context, $path)
{
    $content = 'This is the new file';
    $this_directory = dirname(dirname(__FILE__));
    $fp = fopen($this_directory . $path, 'w');
    fwrite($fp, $content);

    if ($fp) {
        fwrite($fp, $content);
        fclose($fp);
    }

    return [
        'status' => 200,
        'data' => 'OK',
    ];
}
