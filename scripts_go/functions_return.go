/*
 * The following functions test the behavior for unexpected prints or return values
 */

package main

import (
	"fmt"
	"math/rand"

	"github.com/anexia-it/go-e5e"
)

type entrypoints struct{}

// Simple function which returns "bla"
func (f *entrypoints) Func_return_bla(event e5e.Event, context e5e.Context) (*e5e.Return, error) {

	return &e5e.Return{
		Data: "bla",
	}, nil
}

// Simple function which returns chinese data
func (f *entrypoints) Func_return_chinese(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	var message = "世界"
	return &e5e.Return{
		Data: message,
	}, nil
}

// Simple function which prints chinese data
func (f *entrypoints) Func_print_chinese(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	var message = "世界"

	fmt.Printf("%v", message)
	return &e5e.Return{
		Data: "Hello World!",
	}, nil
}

// Simple function which prints about 0.5 MB
func (f *entrypoints) Func_print_0_5_MB(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	var message = Random_string(524300)
	fmt.Println(message)
	fmt.Println(len(message))

	return &e5e.Return{
		Data: "Hello World!",
	}, nil
}

// Simple function which prints about 5 MB
func (f *entrypoints) Func_print_5_MB(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	var message = Random_string(5243000)
	fmt.Println(message)
	fmt.Println(len(message))

	return &e5e.Return{
		Data: "Hello World!",
	}, nil
}

// Simple function which prints about 50 MB
func (f *entrypoints) Func_print_50_MB(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	var message = Random_string(52430000)
	fmt.Println(message)
	fmt.Println(len(message))

	return &e5e.Return{
		Data: "Hello World!",
	}, nil
}

// Simple function which prints about 500 MB
func (f *entrypoints) Func_print_500_MB(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	var message = Random_string(524300000)
	fmt.Println(message)
	fmt.Println(len(message))

	return &e5e.Return{
		Data: "Hello World!",
	}, nil
}

// Simple function which returns about 50 MB
func (f *entrypoints) Func_return_50_MB(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	var message = Random_string(52430000)
	fmt.Println(len(message))

	return &e5e.Return{
		Data: message,
	}, nil
}

// Simple function which returns about 500 MB
func (f *entrypoints) Func_return_500_MB(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	var message = Random_string(524300000)
	fmt.Println(len(message))

	return &e5e.Return{
		Data: message,
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

func main() {
	if err := e5e.Start(&entrypoints{}); err != nil {
		panic(err)
	}
}
