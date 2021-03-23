import random
import string

#
# The following functions test the behavior for unexpected prints or return values
#



# Simple function which prints an emoji
def func_print_emoji(event, context):
    print("\U0001f600")
    
    return {
        'status': 200,
        'data': "OK"
    }
    
# Simple function which returns an emoji
def func_return_emoji(event, context):
    return {
        'status': 200,
        'data': "\U0001f600"
    }

# Simple function which returns "text"
def func_return_ASCII(event, context):
    message = 'text'

    return {
        'status': 200,
        'data': message
    }
    
# Simple function which prints "text"
def func_print_ASCII(event, context):
    message = 'text'
    print(message)
    
    return {
        'status': 200,
        'data': "OK"
    }


# Simple function which returns non utf8 data
def func_return_utf8(event, context):
    message = '奥地利'

    return {
        'status': 200,
        'data': message
    }


# Simple function which prints utf8 data
def func_print_utf8(event, context):
    message = '奥地利'
    # Print the string
    print(message)

    return {
        'status': 200,
        'data': 'OK'
    }


# Simple function which returns utf16 data
def func_return_utf16(event, context):
    message = '奥地利'

    return {
        'status': 200,
        'data': message.encode('utf-16')
    }


# Simple function which prints utf16 data
def func_print_utf16(event, context):
    message = '奥地利'
    # Print the string
    print(message.encode('utf-16'))

    return {
        'status': 200,
        'data': 'OK'
    }


# Simple function which prints about 0,5 MB
def func_print_0_5_MB(event, context):
    lower_upper_alphabet = string.ascii_letters
    string_append = []

    # Append n times a random letter to a string
    n = 60000
    for i in range(n):
        random_letter = random.choice(lower_upper_alphabet)
        string_append.append(random_letter)

    # Print the created string
    print(string_append)

    return {
        'status': 200,
        'data': 'OK'
    }


# Simple function which prints about 5 MB
def func_print_5_MB(event, context):
    lower_upper_alphabet = string.ascii_letters
    string_append = []

    # Append n times a random letter to a string
    n = 600000
    for i in range(n):
        random_letter = random.choice(lower_upper_alphabet)
        string_append.append(random_letter)

    # Print the created string
    print(string_append)

    return {
        'status': 200,
        'data': 'OK'
    }


# Simple function which prints about 50 MB
def func_print_50_MB(event, context):
    lower_upper_alphabet = string.ascii_letters
    string_append = []

    # Append n times a random letter to a string
    n = 6000000
    for i in range(n):
        random_letter = random.choice(lower_upper_alphabet)
        string_append.append(random_letter)

    # Print the created string
    print(string_append)

    return {
        'status': 200,
        'data': 'OK'
    }


# Simple function which prints about 500 MB
def func_print_500_MB(event, context):
    lower_upper_alphabet = string.ascii_letters
    string_append = []

    # Append n times a random letter to a string
    n = 60000000
    for i in range(n):
        random_letter = random.choice(lower_upper_alphabet)
        string_append.append(random_letter)

    # Print the created string
    print(string_append)

    return {
        'status': 200,
        'data': 'OK'
    }


# Simple function which prints about 90 MB
def func_print_90_MB(event, context):
    lower_upper_alphabet = string.ascii_letters
    string_append = []

    # Append n times a random letter to a string
    n = 10000000
    for i in range(n):
        random_letter = random.choice(lower_upper_alphabet)
        string_append.append(random_letter)

    # Print the created string
    print(string_append)

    return {
        'status': 200,
        'data': 'OK',
    }


# Simple function which returns about 50 MB
def func_return_50_MB(event, context):
    lower_upper_alphabet = string.ascii_letters
    string_append = []

    # Append n times a random letter to a string
    n = 6000000
    for i in range(n):
        random_letter = random.choice(lower_upper_alphabet)
        string_append.append(random_letter)

    # Return the generated string
    return {
        'status': 200,
        'data': string_append,
    }


# Simple function which returns about 500 MB
def func_return_500_MB(event, context):
    lower_upper_alphabet = string.ascii_letters
    string_append = []

    # Append n times a random letter to a string
    n = 60000000
    for i in range(n):
        random_letter = random.choice(lower_upper_alphabet)
        string_append.append(random_letter)

    # Return the generated string
    return {
        'status': 200,
        'data': string_append,
    }
