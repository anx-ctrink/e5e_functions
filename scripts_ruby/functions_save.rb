#
# The following functions test the read and write rights
#

def create_file(filename)
    File.open(filename, "w") do |f|     
        f.write('This is a new file.')   
    end
end


# Create file in current folder "func_code" (read-only)
def func_save_textfile_func_code(event, context)
    create_file("file.txt")

    return {
        :status => 200,
        :data => 'OK',
    }
end


# Create file in subfolder of "func_code" (read-only)
def func_save_textfile_func_code_subfolder(event, context)
    create_file("test/file.txt")

    return {
        :status => 200,
        :data => 'OK',
    }
end


# Create file one folder above "func_code" (read and write)
def func_save_textfile_above(event, context)
    file = File.join('..', 'file')
    create_file(file)

    return {
        :status => 200,
        :data => 'OK',
    }
end
