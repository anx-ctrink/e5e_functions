#
# The following functions test the cpu (quota cpu)
#

import random


# Test CPU by multiplying 100 times
def func_multiply_100(event, context):
    number = 2
    counter = 100
    for i in range(counter):
        number *= random.randint(2, 999)

    return {
        'status': 200,
        'data': 'OK'
    }


# Test CPU by multiplying 100.000 times 
def func_multiply_100000(event, context):
    number = 2
    counter = 100000
    for i in range(counter):
        number *= random.randint(2, 999)

    return {
        'status': 200,
        'data': 'OK'
    }


# Test CPU by multiplying 1.000.000 times 
def func_multiply_1000000(event, context):
    number = 2
    counter = 1000000
    for i in range(counter):
        number *= random.randint(2, 999)

    return {
        'status': 200,
        'data': 'OK'
    }
