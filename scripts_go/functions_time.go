/*
 * The following functions use sleeps and / or threads to test the quota time
 */

package main

import (
	"fmt"
	"io/ioutil"
	"log"
	"net/http"
	"os/exec"
	"runtime"
	"sync"
	"time"

	"github.com/anexia-it/go-e5e"
)

type entrypoints struct{}

// Simple function which waits / sleeps 10 seconds
func (f *entrypoints) Func_sleep_10(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	time.Sleep(10 * time.Second)

	return &e5e.Return{
		Data: "Hello world!",
	}, nil
}

// Simple function which waits / sleeps 100 seconds
func (f *entrypoints) Func_sleep_100(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	time.Sleep(100 * time.Second)

	return &e5e.Return{
		Data: "Hello world!",
	}, nil
}

// Subfunction which waits / sleeps for 10 seconds
func (f *entrypoints) Sub_func_sleep_10(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	time.Sleep(10 * time.Second)

	return &e5e.Return{}, nil
}

// Subfunction which waits / sleeps for 20 seconds
func (f *entrypoints) Sub_func_sleep_20(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	time.Sleep(20 * time.Second)

	return &e5e.Return{}, nil
}

// Subfunction which waits / sleeps for 30 seconds
func (f *entrypoints) Sub_func_sleep_30(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	time.Sleep(30 * time.Second)

	return &e5e.Return{}, nil
}

// Function which simulate Threads
func (f *entrypoints) Func_sleep_thread(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	n := runtime.NumCPU()

	if n < 2 {
		log.Fatal("Atleast 2 CPUs needed")
	}

	// Expose CPUs to scheduler
	runtime.GOMAXPROCS(n)

	wg := &sync.WaitGroup{}

	// Use CPUs/2 to give the Go scheduler something to work with
	l := n / 2

	wg.Add(l)

	for i := 0; i < l; i++ {
		go func(wg *sync.WaitGroup, v int) {
			defer wg.Done()

			runtime.LockOSThread()

			defer runtime.UnlockOSThread()

			log.Printf("Hello from %d", v)

			time.Sleep(20 * time.Second)
		}(wg, i)
	}

	wg.Wait()
	log.Println("Finished!")

	return &e5e.Return{
		Data: "Hello world!",
	}, nil
}

// Function which uses a subprocess, where 10 times a 10 second sleep will be started
func (f *entrypoints) Func_sleep_subprocess_10_10(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	for i := 0; i < 10; i++ {
		now := time.Now() // current local time
		exec.Command("sleep", "15").Run()
		fmt.Println(now)
	}

	return &e5e.Return{
		Data: "Hello world!",
	}, nil
}

// Function which performes a Frontier GET request
func (f *entrypoints) Func_get_frontier(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	exec.Command("sleep", "5").Run()
	resp, err := http.Get("https://frontier.anexia-it.com/c5e3db2acc894795ba7e46ce3843647e/v1/e1")
	if err != nil {
		log.Fatalln(err)
	}
	// Read the response body on the line below.
	body, err := ioutil.ReadAll(resp.Body)
	if err != nil {
		log.Fatalln(err)
	}
	// Convert the body to type string
	sb := string(body)
	log.Printf(sb)

	return &e5e.Return{
		Data: "Hello world!",
	}, nil
}

func main() {
	if err := e5e.Start(&entrypoints{}); err != nil {
		panic(err)
	}
}

/*
# Function which use multiprocessing and sleeps (10 times - 10 seconds)
def func_sleep_multiprocessing_10_10(event, context):
    jobs = []
    for i in range(10):
        p = multiprocessing.Process(target=sub_func_sleep_10)
        jobs.append(p)
        p.start()

def func_sleep_multiprocessing_100_10(event, context):
    jobs = []
    for i in range(100):
        p = multiprocessing.Process(target=sub_func_sleep_10)
        jobs.append(p)
        p.start()
*/
