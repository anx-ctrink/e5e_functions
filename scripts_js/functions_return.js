/*
 * The following functions test the behavior for unexpected prints or return values
 */

const utf8 = require('utf8');

// Simple function which returns 'text' in UTF8
exports.returnUtf8 = (event, context) => {
    var message = 'text';

    return {
        'status': 200,
        'data': utf8.encode(message),
        
    };
};
    
// Simple function which prints 'message' in UTF8
exports.printUtf8 = (event, context) => {
    var message = 'text';
    console.log(utf8.encode(message));

    return {
        'status': 200,
        'data': 'OK',
        
    };
};

// Simple function which returns 'text'
exports.returnUtf16 = (event, context) => {
    var message = 'text';

    return {
        'status': 200,
        'data': message,
        
    };
};
    
// Simple function which prints 'message'
exports.printUtf16 = (event, context) => {
    var message = 'text';
    console.log(message);

    return {
        'status': 200,
        'data': 'OK',
        
    };
};

// Simple function which returns ASCII data
exports.returnAscii = (event, context) => {
    var message = u2A('text')

    return {
        'status': 200,
        'data': message,
        
    };
};

// Simple function which prints ASCII  data
exports.printAscii = (event, context) => {
    var message = u2A('text');
    console.log(message);

    return {
        'status': 200,
        'data': 'OK',
        
    };
};

// Convert unicode to ASCII
function u2A(str) {
    var reserved = '';
    var code = str.match(/&#(d+);/g);

    if (code === null) {
        return str;
    }

    for (var i = 0; i < code.length; i++) {
        reserved += String.fromCharCode(code[i].replace(/[&#;]/g, ''));
    }

    return reserved;
}

function generateString(size) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var characters_length = characters.length;
    for ( var i = 0; i < size / 2; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * characters_length));
    }
    console.log(result.length);
    console.log(result);
    return result;
 }

// Simple function which prints about 0,5 MB
exports.print05MB = (event, context) => {
    const string_append = generateString(525000);
    
    return {
        'status': 200,
        'data': 'OK',
        
    };
};

// Simple function which prints about 5 MB
exports.print5MB = (event, context) => {
    const string_append = generateString(5250000);

    return {
        'status': 200,
        'data': 'OK',
        
    };
};

// Simple function which prints about 50 MB
exports.print50MB = (event, context) => {
    const string_append = generateString(52500000);
    
    return {
        'status': 200,
        'data': 'OK',
        
    };
};

// Simple function which prints about 500 MB
exports.print500MB = (event, context) => {
    const string_append = func_generate_string(525000000);

    return {
        'status': 200,
        'data': 'OK',
        
    };
};

// Simple function which returns about 0,5 MB
exports.return05MB = (event, context) => {
    const string_append = generateString(525000);

    return {
        'status': 200,
        'data': string_append,
        
    };
};

// Simple function which returns about 5 MB
exports.return5MB = (event, context) => {
    const string_append = generateString(5250000);
    
    return {
        'status': 200,
        'data': string_append,
        
    };
};

// Simple function which returns about 50 MB
exports.return50MB = (event, context) => {
    const string_append = func_generate_string(52500000);
    
    return {
        'status': 200,
        'data': string_append,
        
    };
};

// Simple function which returns about 500 MB
exports.return500MB = (event, context) => {
    const string_append = generateString(525000000);
    
    return {
        'status': 200,
        'data': string_append,
        
    };
};