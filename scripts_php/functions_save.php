<?php

/** 
 * The following functions test the read and write rights 
 */ 

// Create file in current directory 'func_code' (read-only)
function func_save_textfile_func_code($event, $context) 
{
    $content = 'This is the new file';
    $this_directory = dirname(dirname(__FILE__));
    $fp = fopen($this_directory . '/file.txt', 'w');
    if ($fp) {
        fwrite($fp, $content); 
        fclose($fp);
    }
}

// Create file in subdirectory of 'func_code' (read-only)
function func_save_textfile_func_code_subfolder($event, $context) 
{
    $content = 'This is the new file';
    $this_directory = dirname(dirname(__FILE__));
    $fp = fopen($this_directory . '/test/file.txt', 'w');
    if ($fp) {
        fwrite($fp, $content); 
        fclose($fp);
    }
}

// Create file one folder above 'func_code' (read and write) 
function func_save_textfile_above($event, $context) 
{
    $content = 'This is the new file';
    $this_directory = dirname(dirname(__FILE__));
    $fp = fopen($this_directory . '/../../file.txt', 'w');
    fwrite($fp, $content); 
    if ($fp) {
        fwrite($fp, $content); 
        fclose($fp);
    }
}

?>
