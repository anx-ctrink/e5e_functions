/*
 * The following functions test the cpu (quota cpu)
 */

package main

import (
	"fmt"
	"io/ioutil"
	"log"
	"net/http"
	"os/exec"
	"strconv"
)

type entrypoints struct{}

func main() {
	// Infinite loop
	counter := 1
	for true {
		fmt.Println("loop " + strconv.Itoa(counter))
		fmt.Println("start sleep")

		exec.Command("sleep", "5").Run()
		fmt.Println("start get")
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
		counter++
	}
}
