#
# The following functions are testing the chosen storage settings (quota memory, quota storage)
#

def generate_string(number)
    charset = Array('A'..'Z') + Array('a'..'z')
    Array.new(number) { charset.sample }.join
end
    
# Test RAM (quota memory) by generating a 5 MB string
def func_quota_memory_5_MB(event, context)
    # Create string with random letters and defined length
    string_append = generate_string(6000000)

    return {
        :status => 200,
        :data => 'OK',
    }
end


# Test RAM (quota memory) by generating a 90 MB string
def func_quota_memory_50_MB(event, context)
    # Create string with random letters and defined length
    string_append = generate_string(60000000)

    return {
        :status => 200,
        :data => 'OK',
    }
end


# Test RAM (quota memory) by generating a 90 MB string
def func_quota_memory_100_MB(event, context)
    # Create string with random letters and defined length
    string_append = generate_string(105000000)

    return {
        :status => 200,
        :data => 'OK',
    }
end


def func_quota_storage_x_MB(size)
    file_size = 0
    string    = "abcdefghijklmnopqrstuvwxyz123456"
    file = File.join('..', 'file')
    File.open(file, 'w') do |f|
        while file_size < size.to_i * 1048576 # bytes in 1MB
            f.print string
            file_size += string.size
        end
    end
end


# Test ROM (quota storage) by generating a 5 MB file
def func_quota_storage_5_MB(event, context)
    func_quota_storage_x_MB(5)
end


# Test ROM (quota storage) by generating a 50 MB file
def func_quota_storage_50_MB(event, context)
    func_quota_storage_x_MB(50)
end


# Test ROM (quota storage) by generating a 90 MB file
def func_quota_storage_90_MB(event, context)
    func_quota_storage_x_MB(90)
end


# Test ROM (quota storage) by generating a 1GB file
def func_quota_storage_1024_MB(event, context)
    func_quota_storage_x_MB(1024)
end
