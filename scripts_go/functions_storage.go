/*
 * The following functions are testing the chosen storage settings (quota memory, quota storage)
 */

package main

import (
	"fmt"
	"log"
	"math/rand"
	"os"

	"github.com/anexia-it/go-e5e"
)

type entrypoints struct{}

// Test RAM (quota memory) by generating a 5 MB string
func (f *entrypoints) Func_quota_memory_5_MB(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	var message = Random_string(5243000)
	fmt.Println(len(message))

	return &e5e.Return{
		Data: message,
	}, nil
}

// Test RAM (quota memory) by generating a 50 MB string
func (f *entrypoints) Func_quota_memory_50_MB(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	var message = Random_string(52430000)
	fmt.Println(len(message))

	return &e5e.Return{
		Data: "Hello World",
	}, nil
}

// Test RAM (quota memory) by generating a 500 MB string
func (f *entrypoints) Func_quota_memory_500_MB(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	var message = Random_string(52430000)
	fmt.Println(len(message))
	return &e5e.Return{
		Data: "Hello World",
	}, nil
}

// A function which returns a random string with a given length
func Random_string(n int) string {
	var letter = []rune("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789")

	b := make([]rune, n)
	for i := range b {
		b[i] = letter[rand.Intn(len(letter))]
	}
	return string(b)
}

// Create 5 MB file to test storage quota (5.1 MB)
func (f *entrypoints) Func_quota_storage_5_MB(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	// If the file doesn't exist, create it, or append to the file
	fi, err2 := os.OpenFile("../../text.txt", os.O_APPEND|os.O_CREATE|os.O_WRONLY, 0644)
	if err2 != nil {
		log.Println(err2)
	}
	defer fi.Close()
	for i := 0; i < 500000; i++ {
		if _, err2 := fi.WriteString("This text appends to the file.\n"); err2 != nil {
			log.Println(err2)
		}
	}
	fi2, err := os.Stat("../../text.txt")
	if err != nil {
		log.Println(err2)
	}
	fmt.Printf("The file is %d bytes long", fi2.Size())
	return &e5e.Return{
		Data: "Hello World!",
	}, nil
}

// Create 50 MB file to test storage quota (50.11 MB)
func (f *entrypoints) Func_quota_storage_50_MB(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	// If the file doesn't exist, create it, or append to the file
	fi, err2 := os.OpenFile("../../text.txt", os.O_APPEND|os.O_CREATE|os.O_WRONLY, 0644)
	if err2 != nil {
		log.Println(err2)
	}
	defer fi.Close()
	for i := 0; i < 1695000; i++ {
		if _, err2 := fi.WriteString("This text appends to the file.\n"); err2 != nil {
			log.Println(err2)
		}
	}
	fi2, err := os.Stat("../../text.txt")
	if err != nil {
		log.Println(err2)
	}
	fmt.Printf("The file is %d bytes long", fi2.Size())
	return &e5e.Return{
		Data: "Hello World!",
	}, nil
}

// Create file one folder above "func_code" (read and write)
func (f *entrypoints) Func_quota_storage_100_MB(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	// If the file doesn't exist, create it, or append to the file
	fi, err2 := os.OpenFile("../../text.txt", os.O_APPEND|os.O_CREATE|os.O_WRONLY, 0644)
	if err2 != nil {
		log.Println(err2)
	}
	defer fi.Close()
	for i := 0; i < 3400000; i++ {
		if _, err2 := fi.WriteString("This text appends to the file.\n"); err2 != nil {
			log.Println(err2)
		}
	}
	fi2, err := os.Stat("../../text.txt")
	if err != nil {
		log.Println(err2)
	}
	fmt.Printf("The file is %d bytes long", fi2.Size())
	return &e5e.Return{
		Data: "Hello World!",
	}, nil
}

func main() {
	if err := e5e.Start(&entrypoints{}); err != nil {
		panic(err)
	}
}
