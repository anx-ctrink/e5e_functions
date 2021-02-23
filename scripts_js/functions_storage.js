/*
 * The following functions are testing the chosen storage settings (quota memory, quota storage)
 */

const fs = require('fs');

function generateString(size) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < size / 2; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    console.log(result.length);
    console.log(result);
    return result;
 }
    
// Test RAM (quota memory) by generating a 5 MB string
exports.quotaMemory5MB = (event, context) => {
    const stringAppend = generateString(5 * 1024 * 1024); // 5 MB

    return {
        'status': 200,
        'data': 'OK',
        
    };
};

// Test RAM (quota memory) by generating a 90 MB string
exports.quotaMemory90MB = (event, context) => {
    const stringAppend = generateString(90 * 1024 * 1024); // 90 MB

    return {
        'status': 200,
        'data': 'OK',
        
    };
};

// Test RAM (quota memory) by generating a 100 MB string
exports.quotaMemory100MB = (event, context) => {
    const stringAppend = generateString(100 * 1024 * 1024); // 100 MB

    return {
        'status': 200,
        'data': 'OK',
        
    };
};

const quotaStorageXMB = (fileName, size) => {
    return new Promise((resolve, reject) => {
        fh = fs.openSync(fileName, 'w');
        fs.writeSync(fh, 'ok', Math.max(0, size - 2));
        fs.closeSync(fh);
        resolve(true);
    });
};

// Test ROM (quota storage) by generating a 5 MB file
exports.quotaStorage5MB = (event, context) => {
    quotaStorageXMB('../newfile.txt', 5 * 1024 * 1024);

    return {
        'status': 200,
        'data': 'OK',
        
    };
};

// Test ROM (quota storage) by generating a 50 MB file
exports.quotaStorage50MB = (event, context) => {
    quotaStorageXMB('../newfile.txt', 50 * 1024 * 1024); // 50 MB

    return {
        'status': 200,
        'data': 'OK',
        
    };
};

// Test ROM (quota storage) by generating a 90 MB file
exports.quotaStorage90MB = (event, context) => {
    quotaStorageXMB('../newfile.txt', 90 * 1024 * 1024); // 90 MB

    return {
        'status': 200,
        'data': 'OK',
        
    };
};

// Test ROM (quota storage) by generating a 1GB file
exports.quotaStorage1024MB = (event, context) => {
    quotaStorageXMB('../newfile.txt', 1024 * 1024 * 1024); // 1 GB

    return {
        'status': 200,
        'data': 'OK',
        
    };
};