import time
import threading
import multiprocessing
import subprocess
import requests


#
# The following functions use sleeps and / or threads to test the quota time
#


# Simple function which waits / sleeps 10 seconds
def func_sleep_10(event, context):
    time.sleep(10)
    return {
        'status': 200,
        'data': 'OK'
    }


# Simple function which waits / sleeps 100 seconds  
def func_sleep_100(event, context):
    time.sleep(100)
    return {
        'status': 200,
        'data': 'OK'
    }


# Subfunction which waits / sleeps for 10 seconds
def sub_func_sleep_10():
    print('Starting Subfunction which waits 10 seconds')
    time.sleep(10)
    print('Exiting Subfunction after 10 seconds')


# Function which waits / sleeps for 20 seconds
def sub_func_sleep_20():
    print('Starting Subfunction which waits 20 seconds')
    time.sleep(20)
    print('Exiting Subfunction after 20 seconds')


# Function which waits / sleeps for 30 seconds    
def sub_func_sleep_30():
    print('Starting Subfunction which waits 30 seconds')
    time.sleep(30)
    print('Exiting Subfunction after 30 seconds')


# Function which starts 2 Threads
def func_sleep_thread(event, context):
    print('Starting function, which start Thread 1 and Thread 2')
    t1 = threading.Thread(name='thread_1', target=sub_func_sleep_10)
    t2 = threading.Thread(name='thread_2', target=sub_func_sleep_20)
    t1.start()
    t2.start()
    print('Exiting func_sleep_thread')


# Function which starts a thread and another function where two threads will be started
def func_sleep_thread_sub(event, context):
    print('Starting 2 Threads. The first is a simple one and the second one calls two other threads.')
    t1 = threading.Thread(name='thread_1', target=sub_func_sleep_20)
    t2 = threading.Thread(name='thread_2', target=func_sleep_thread, args=(event, context))
    t1.start()
    t2.start()
    print('Exiting')


# Function with a daemon thread (main function does not wait for the end of thread)
def func_sleep_thread_daemon_30(event, context):
    print('Starting func_sleep_thread_daemon')
    t3 = threading.Thread(name='thread_3', target=sub_func_sleep_30)
    t3.setDaemon(True)
    t3.start()
    print('Exiting func_sleep_thread_daemon')


# Function which starts a thread and another function where two threads will be started 
def func_thread_frontier(event, context):
    print('Starting 2 Threads. Call two times frontier')
    t1 = threading.Thread(name='thread_1', target=func_get_frontier, args=(event, context))
    t2 = threading.Thread(name='thread_2', target=func_sleep_10, args=(event, context))
    t1.start()
    t2.start()
    print('Exiting')


# Frontier request
def func_get_frontier(event, context):
    time.sleep(5)
    response = requests.get("https://frontier.anexia-it.com/c5e3db2acc894795ba7e46ce3843647e/v1/e1")
    print(response.status_code)
    print(response.text)


# Function which uses a subprocess, where 10 times a 10 second sleep will be started
def func_sleep_subprocess_10_10(event, context):
    procs = []
    for _ in range(10):
        proc = subprocess.Popen(['python3 -c "import functions_time as ft; ft.sub_func_sleep_10()"'], shell=True)
        procs.append(proc)


# Function which uses a subprocess, where 100 times a 10 second sleep will be started
def func_sleep_subprocess_100_10(event, context):
    procs = []
    for _ in range(100):
        proc = subprocess.Popen(['python3 -c "import functions_time as ft; ft.sub_func_sleep_10()"'], shell=True)
        procs.append(proc)


# Function which use multiprocessing and sleeps (10 times - 10 seconds)
def func_sleep_multiprocessing_10_10(event, context):
    jobs = []
    for i in range(10):
        p = multiprocessing.Process(target=sub_func_sleep_10)
        jobs.append(p)
        p.start()

# Function which use multiprocessing and sleeps (100 times - 10 seconds)
def func_sleep_multiprocessing_100_10(event, context):
    jobs = []
    for i in range(100):
        p = multiprocessing.Process(target=sub_func_sleep_10)
        jobs.append(p)
        p.start()
