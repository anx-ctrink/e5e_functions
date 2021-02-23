/*
 * The following functions use sleeps and / or threads to test the quota time
 */

const { spawn } = require('child_process');

function msleep(n) {
    Atomics.wait(new Int32Array(new SharedArrayBuffer(4)), 0, 0, n);
}


function sleep(n) {
    msleep(n * 1000);
}

// Simple function which waits / sleeps 10 seconds
exports.sleep10 = (event, context) => {
    sleep(10);

    return {
        'status': 200,
        'data': 'OK',

    };
};

// Simple function which waits / sleeps 100 seconds  
exports.sleep100 = (event, context) => {
    sleep(100);

    return {
        'status': 200,
        'data': 'OK',

    };
};

// Subfunction which waits / sleeps for 10 seconds
exports.subSleep10 = () => {
    console.log('Starting Subfunction which waits 10 seconds');
    sleep(10)
    console.log('Exiting Subfunction after 10 seconds');
}

// Subfunction which waits / sleeps for 20 seconds
exports.subSleep20 = () => {
    console.log('Starting Subfunction which waits 20 seconds');
    sleep(20)
    console.log('Exiting Subfunction after 20 seconds');
}

// Subfunction which waits / sleeps for 30 seconds
exports.subSleep30 = () => {
    console.log('Starting Subfunction which waits 30 seconds');
    sleep(30)
    console.log('Exiting Subfunction after 30 seconds');
}


// Function which starts 2 Threads
exports.sleepThread = (event, context) => {
    console.log('Starting function, which start Thread 1 and Thread 2')
    const path = require('path')
    const { Worker, isMainThread, parentPort, workerData } = require('worker_threads')
    
    console.log('main')
    const threads = new Set()

    threads.add(new Worker(path.join(__dirname, 'functions_time_worker.js'), { workerData: { name: 'thread1', target: 'subSleep10' } }))
    threads.add(new Worker(path.join(__dirname, 'functions_time_worker.js'), { workerData: { name: 'thread2', target: 'subSleep20' } }))

    for (let worker of threads) {
        worker.on('error', (err) => { throw err })
        worker.on('exit', () => {
            threads.delete(worker)
        })
        worker.on('message', (msg) => {
            console.log('worker msg: ' + msg)
        })
    }
    
    console.log('Exiting')
};

// Function which starts a thread and another function where two threads will be started
exports.sleepThreadSub = (event, context) => {
    console.log('Starting function, which start Thread 1 and Thread 2')
    const path = require('path')
    const { Worker, isMainThread, parentPort, workerData } = require('worker_threads')
    if (isMainThread) {
        console.log('main')
        const threads = new Set()

        threads.add(new Worker(path.join(__dirname, 'functions_time_worker.js'), { workerData: { name: 'thread1', target: 'subSleep20' } }))
        threads.add(new Worker(path.join(__dirname, 'functions_time_worker.js'), { workerData: { name: 'thread2', target: 'sleepThread' } }))

        for (let worker of threads) {
            worker.on('error', (err) => { throw err })
            worker.on('exit', () => {
                threads.delete(worker)
            })
            worker.on('message', (msg) => {
                console.log('worker msg: ' + msg)
            })
        }
    }
    console.log('Exiting')
};

// Function which starts a thread and another function where two threads will be started 
exports.threadFrontier = (event, context) => {
    console.log('Starting function, which start Thread 1 and Thread 2')
    const path = require('path')
    const { Worker, isMainThread, parentPort, workerData } = require('worker_threads')
    if (isMainThread) {
        console.log('main')
        const threads = new Set()

        threads.add(new Worker(path.join(__dirname, 'functions_time_worker.js'), { workerData: { name: 'thread1', target: 'getFrontier' } }))
        threads.add(new Worker(path.join(__dirname, 'functions_time_worker.js'), { workerData: { name: 'thread2', target: 'subSleep10' } }))

        for (let worker of threads) {
            worker.on('error', (err) => { throw err })
            worker.on('exit', () => {
                threads.delete(worker)
            })
            worker.on('message', (msg) => {
                console.log('worker msg: ' + msg)
            })
        }
    }
    console.log('Exiting')
};


// Frontier request
exports.getFrontier = () => {
    const https = require('https');
    https.get('https://frontier.anexia-it.com/c5e3db2acc894795ba7e46ce3843647e/v1/e1', (resp) => {
        let data = '';

        // A chunk of data has been received.
        resp.on('data', (chunk) => {
            data += chunk;
        });

        // The whole response has been received. Print out the result.
        resp.on('end', () => {
            console.log(JSON.parse(data).explanation);
        });

    }).on("error", (err) => {
        console.log("Error: " + err.message);
    });

    return {
        'status': 200,
        'data': 'OK',

    };
};

// Function which uses a subprocess, where 10 times a 10 second sleep will be started
exports.sleepSubprocess10Times10Seconds = () => {
    const path = require('path')
    let procs = []
    for (let i = 0; i <= 10; i++) {
        let p = spawn('node', [path.join(__dirname, 'functions_time_subprocess.js')])
        procs.push(p)
        p.stdout.on('data', (data) => {
            console.log(`stdout: ${data}`);
          });
    }
}

// Function which uses a subprocess, where 100 times a 10 second sleep will be started
exports.sleepSubprocess100Times10Seconds = () => {
    const path = require('path')
    let procs = []
    for (let i = 0; i <= 100; i++) {
        let p = spawn('node', [path.join(__dirname, 'functions_time_subprocess.js')])
        procs.push(p)
        p.stdout.on('data', (data) => {
            console.log(`stdout: ${data}`);
          });
    }
}
