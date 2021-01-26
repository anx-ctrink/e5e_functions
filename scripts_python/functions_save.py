import os

#
# The following functions test the read and write rights
#


# Create file in current folder "func_code" (read-only)
def func_save_textfile_func_code(event, context):
    dir_path = os.getcwd()
    print("Try to write into directory " + dir_path)
    f = open(os.path.join(dir_path, 'file.txt'), 'w+')
    f.write('This is the new file.')
    f.close()

    return {
        'status': 200,
        'data': 'OK'
    }


# Create file in subfolder of "func_code" (read-only)
def func_save_textfile_func_code_subfolder(event, context):
    dir_path = os.getcwd()
    print("Try to write into directory " + dir_path)
    os.makedirs(dir_path + "/test")
    f = open(os.path.join(dir_path, 'test/file.txt'), 'w+')
    f.write('This is the new file.')
    f.close()

    return {
        'status': 200,
        'data': 'OK'
    }


# Create file one folder above "func_code" (read and write)
def func_save_textfile_above(event, context):
    path = os.getcwd()
    file_path = os.path.join(path, '..', 'file.txt')
    print("Write following file: " + file_path)
    f = open(file_path, 'w+')
    f.write('This is the new file.')
    f.close()

    return {
        'status': 200,
        'data': 'OK'
    }
