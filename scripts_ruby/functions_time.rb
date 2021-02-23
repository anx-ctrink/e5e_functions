require 'net/http'

#
# The following functions use sleeps and / or threads to test the quota time
#


# Simple function which waits / sleeps 10 seconds
def func_sleep_10(event, context)
    sleep(10)
    return {
        :status => 200,
        :data => 'OK',
    }
end


# Simple function which waits / sleeps 100 seconds  
def func_sleep_100(event, context)
    sleep(100)
    return {
        :status => 200,
        :data => 'OK',
    }
end


# Subfunction which waits / sleeps for 10 seconds
def sub_func_sleep_10()
    puts 'Starting Subfunction which waits 10 seconds'
    sleep(10)
    puts 'Exiting Subfunction after 10 seconds'
end


# Function which waits / sleeps for 20 seconds
def sub_func_sleep_20()
    puts 'Starting Subfunction which waits 20 seconds'
    sleep(20)
    puts 'Exiting Subfunction after 20 seconds'
end


# Function which waits / sleeps for 30 seconds    
def sub_func_sleep_30()
    puts 'Starting Subfunction which waits 30 seconds'
    sleep(30)
    puts 'Exiting Subfunction after 30 seconds'
end


# Function which starts 2 Threads
def func_sleep_thread(event, context)
    puts 'Starting function, which start Thread 1 and Thread 2'
    t1 = Thread.new{sub_func_sleep_10} 
    t2 = Thread.new{sub_func_sleep_20} 
    t1.join
    t2.join
    puts 'Exiting func_sleep_thread'
end


# Function which starts a thread and another function where two threads will be started
def func_sleep_thread_sub(event, context)
    puts 'Starting 2 Threads. The first is a simple one and the second one calls two other threads.'
    t1 = Thread.new{sub_func_sleep_20} 
    t2 = Thread.new{func_sleep_thread(event, context)} 
    t1.join
    t2.join
    puts 'Exiting func_sleep_thread_sub'
end


# Function with a daemon thread (main function does not wait for the end of thread)
def func_sleep_thread_daemon_30(event, context)
    puts 'Starting func_sleep_thread_daemon'
    t3 = threading.Thread(name='thread_3', target=sub_func_sleep_30)
    t3.setDaemon(True)
    t3.start()
    puts 'Exiting func_sleep_thread_daemon'
end


# Function which starts a thread and another function where two threads will be started 
def func_thread_frontier(event, context)
    puts 'Starting 2 Threads. Call two times frontier'
    t1 = Thread.new{func_get_frontier(event, context)} 
    t2 = Thread.new{func_sleep_10(event, context)} 
    t1.join
    t2.join
    puts 'Exiting'
end


# Frontier request
def func_get_frontier(event, context)
    sleep(5)
    uri = URI('https://frontier.anexia-it.com/c5e3db2acc894795ba7e46ce3843647e/v1/e1')
    res = Net::HTTP.get_response(uri)   
    puts "Response Code" + res.code
    puts "Response Message " + res.message  
    puts "Response Class Name " + res.class.name
    puts "Response Body " + res.body
end


# Function which uses a subprocess, where 10 times a 10 second sleep will be started
def func_sleep_subprocess_10_10(event, context)
    procs = []
    for i in 1..10
        proc = subprocess.Popen(['python3 -c "import functions_time as ft; ft.sub_func_sleep_10()"'], shell=True)
        procs.append(proc)
    end
end


# Function which uses a subprocess, where 10 times a 10 second sleep will be started
def func_sleep_subprocess_100_10(event, context)
    procs = []
    for i in 1..100
        proc = subprocess.Popen(['python3 -c "import functions_time as ft; ft.sub_func_sleep_10()"'], shell=True)
        procs.append(proc)
    end
end


# Function which use multiprocessing and sleeps (10 times - 10 seconds)
def func_sleep_multiprocessing_10_10(event, context)
    read_stream, write_stream = IO.pipe
    10.times do
        Process.fork do
            sub_func_sleep_10()
        end
    end
    Process.waitall
    write_stream.close
    results = read_stream.read
    read_stream.close
end

# Function which use multiprocessing and sleeps (100 times - 10 seconds)
def func_sleep_multiprocessing_100_10(event, context)
    read_stream, write_stream = IO.pipe
    100.times do
        Process.fork do
            sub_func_sleep_10()
        end
    end
    Process.waitall
    write_stream.close
    results = read_stream.read
    read_stream.close
end
