import random
import string
import sys
import os

#
# The following functions are testing the chosen storage settings (quota memory, quota storage)
#

# Test RAM (quota memory) by generating a 5 MB string
def func_quota_memory_5_MB(event, context):
    lower_upper_alphabet = string.ascii_letters
    string_append = []
    
    # Append n times a random letter to a string
    n = 650
    for i in range(n):
        random_letter = random.choice(lower_upper_alphabet)
        string_append.append(random_letter)

    return {
        'status': 200,
        'data': 'OK'}

# Test RAM (quota memory) by generating a 90 MB string
def func_quota_memory_50_MB(event, context):
    # Generate string with ascii letters
    lower_upper_alphabet = string.ascii_letters
    string_append = []
    
    # Append n times a random ascii letter
    n = 6000000
    for i in range(n):
        random_letter = random.choice(lower_upper_alphabet)
        string_append.append(random_letter)

    # Print the size of the generated string
    print("Byte: " + str(sys.getsizeof(string_append)))
    return {
        'status': 200,
        'data': 'OK'}
    
# Test RAM (quota memory) by generating a 90 MB string
def func_quota_memory_90_MB(event, context):
    # Generate string with ascii letters
    lower_upper_alphabet = string.ascii_letters
    string_append = []
    
    # Append n times a random ascii letter
    n = 10000000
    for i in range(n):
        random_letter = random.choice(lower_upper_alphabet)
        string_append.append(random_letter)

    # Print the size of the generated string
    print("Byte: " + str(sys.getsizeof(string_append)))
    return {
        'status': 200,
        'data': 'OK'}
    
# Test ROM (quota storage) by generating a 5 MB file
def func_quota_storage_5_MB(event, context):
    # Create a file the path above, since the actual one is read-only
    path = os.getcwd()
    file_path = os.path.join(path, '..', 'file.txt')

    # Open file to append n times a line
    f = open(file_path, "a+")
    n = 650
    for i in range(n):
        f.write("Appended line %d\r\n" % (i+1))
    
    f.close()

    return {
        'status': 200,
        'data': 'OK'}
    
# Test ROM (quota storage) by generating a 50 MB file
def func_quota_storage_50_MB(event, context):
    # Create a file the path above, since the actual one is read-only
    path = os.getcwd()
    file_path = os.path.join(path, '..', 'file.txt')
    
    # Open created file to append n times a line
    f = open(file_path, "a+")
    n = 6000000
    for i in range(n):
        f.write("Appended line %d\r\n" % (i+1))
    
    f.close()

    return {
        'status': 200,
        'data': 'OK'}
    
# Test ROM (quota storage) by generating a 90 MB file
def func_quota_storage_90_MB(event, context):
    # Create a file the path above, since the actual one is read-only
    path = os.getcwd()
    file_path = os.path.join(path, '..', 'file.txt')
    
    # Open created file to append n times a line
    f = open(file_path, "a+")
    n = 10000000
    for i in range(n):
        f.write("Appended line %d\r\n" % (i+1))
    
    f.close()

    return {
        'status': 200,
        'data': 'OK'}
    