/*
 * The following functions test the read and write rights
 */

// Create file function
function createFile(filename) {
    var fs = require('fs');
    
    // writeFile function with filename, content and callback function
    fs.writeFile(filename, 'This is a new file', function (err) {
    if (err) throw err;
    console.log('File is created successfully.');
    });
 } 

// Create file in current folder "func_code" (read-only)
exports.saveTextfileFuncCode = (event, context) => {
    createFile('newfile.txt');

    return {
        'status': 200,
        'data': 'OK',
        
    };
};

// Create file in subfolder of "func_code" (read-only)
exports.saveTextfileFuncCodeSubfolder = (event, context) => {
    createFile('test/newfile.txt');

    return {
        'status': 200,
        'data': 'OK',
        
    };
};

// Create file one folder above "func_code" (read and write)
exports.saveTextfileAbove = (event, context) => {
    createFile('../newfile.txt');

    return {
        'status': 200,
        'data': 'OK',
        
    };
};
