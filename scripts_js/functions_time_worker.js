const t = require('./functions_time.js')
const { parentPort, workerData } = require('worker_threads')

parentPort.postMessage('starting ' + workerData.name)
t[workerData.target]()
parentPort.postMessage('exiting ' + workerData.name)