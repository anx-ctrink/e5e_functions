/*
 * The following functions test the cpu (quota cpu)
 */


function multiply(number) {
    result = 2;
    for (i = 0; i < number; i++) {
        result *= Math.floor((Math.random() * 999) + 2);
    }
 } 

//Test CPU by multiplying 100 times
exports.multiply100 = (event, context) => {
    multiply(100);

    return {
        'data': 'OK',
        'status': 200,
    };
};

//Test CPU by multiplying 100.000 times
exports.multiply100000 = (event, context) => {
    multiply(100000);
    return {
        'data': 'OK',
        'status': 200,
    };
};


//Test CPU by multiplying 1.000.000 times
exports.multiply1000000 = (event, context) => {
    multiply(1000000);
    
    return {
        'data': 'OK',
        'status': 200,
    };
};
