import random
import string

#
#  The following functions test the behavior for unexpected prints or return values
#

# Simple function which returns "bla"
def func_return_bla(event, context):
    message = 'bla'
    
    return {
        'status': 200,
        'data': message}
    
# Simple function which returns non utf8 data
def func_return_non_utf8(event, context):
    message1 = 'AB\xfc'
    message2 = u'æ'.encode('cp1252')
    
    return {
        'status': 200,
        'data': message2}
    
# Simple function which prints non utf8 data
def func_print_non_utf8(event, context):
    # Two strings with non-ut8 data
    s1 = 'AB\xfc'
    s2 = u'æ'.encode('cp1252')
    
    # Print the strings
    print(s1)
    print(s2)
    
    return {
        'status': 200,
        'data': 'OK'}
    
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
        'data': 'OK'}
    
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
        'data': 'OK'}
    
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
        'data': 'OK'}   

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
        'data': 'OK'}   
           
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
        'data': 'OK'}
    
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
        'data': string_append}   

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
        'data': string_append}   