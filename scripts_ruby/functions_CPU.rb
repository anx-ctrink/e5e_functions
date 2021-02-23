#
# The following functions test the cpu (quota cpu)
#

def multply(number)
    result = 2

    for i in 1..number
        result *= rand(2..999)
    end
end

# Test CPU by multiplying 100 times
def func_multiply_100(event, context)
    multiply(100)

    return {
        :status => 200,
        :data => 'OK',
    }
end

# Test CPU by multiplying 100.000 times 
def func_multiply_100000(event, context)
    multiply(100000)

    return {
        :status => 200,
        :data => 'OK',
    }
end


# Test CPU by multiplying 1.000.000 times 
def func_multiply_1000000(event, context)
    multiply(1000000)

    return {
        :status => 200,
        :data => 'OK',
    }
end