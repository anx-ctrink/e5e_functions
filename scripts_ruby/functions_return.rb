#
# The following functions test the behavior for unexpected prints or return values
#

# Simple function which returns "text"
def func_return_ASCII(event, context)
    message = 'text'

    return {
        :status => 200,
        :data => message,
    }
end
    

# Simple function which prints "message"
def func_print_ASCII(event, context)
    puts 'message'
    
    return {
        :status => 200,
        :data => 'OK',
    }
end


# Simple function which returns non utf8 data
def func_return_utf8(event, context)
    message = '奥地利'

    return {
        :status => 200,
        :data => message,
    }
end


# Simple function which prints utf8 data
def func_print_utf8(event, context)
    message = '奥地利'
    # Print the string
    puts message

    return {
        :status => 200,
        :data => 'OK',
    }
end


# Simple function which returns non utf8 data
def func_return_utf16(event, context)
    message = '奥地利'

    return {
        :status => 200,
        :data => message.encode('utf-16'),
    }
end


# Simple function which prints utf8 data
def func_print_utf16(event, context)
    message = '奥地利'
    # Print the string
    puts message.encode('utf-16')

    return {
        :status => 200,
        :data => message.encode('utf-16'),
    }
end

# Simple function which generate string with given size
def generate_string(number)
    charset = Array('A'..'Z') + Array('a'..'z')
    Array.new(number) { charset.sample }.join
end


# Simple function which prints about 0,5 MB
def func_print_0_5_MB(event, context)
    # Generate string with defined length
    string_append = generate_string(60000)

    # Print the created string
    puts string_append

    return {
        :status => 200,
        :data => 'OK',
    }
end


# Simple function which prints about 5 MB
def func_print_5_MB(event, context)
    # Generate string with defined length
    string_append = generate_string(600000)

    # Print the created string
    puts string_append

    return {
        :status => 200,
        :data => 'OK',
    }
end


# Simple function which prints about 50 MB
def func_print_50_MB(event, context)
    # Generate string with defined length
    string_append = generate_string(6000000)

    # Print the created string
    puts string_append

    return {
        :status => 200,
        :data => 'OK',
    }
end


# Simple function which prints about 500 MB
def func_print_500_MB(event, context)
    # Generate string with defined length
    string_append = generate_string(60000000)

    # Print the created string
    puts string_append

    return {
        :status => 200,
        :data => 'OK',
    }
end


# Simple function which prints about 90 MB
def func_print_90_MB(event, context)
     # Generate string with defined length
     string_append = generate_string(10000000)

     # Print the created string
     puts string_append
     puts string_append.bytesize

    return {
        :status => 200,
        :data => 'OK',
    }
end


# Simple function which returns about 50 MB
def func_return_50_MB(event, context)
    # Generate string with defined length
    string_append = generate_string(6000000)

    # Return the generated string
    return {
        :status => 200,
        :data => string_append,
    }
end


# Simple function which returns about 500 MB
def func_return_500_MB(event, context)
    # Generate string with defined length
    string_append = generate_string(60000000)

    # Return the generated string
    return {
        :status => 200,
        :data => string_append,
    }
end
