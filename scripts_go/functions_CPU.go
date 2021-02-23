/*
 * The following functions test the cpu (quota cpu)
 */

package main

import (
	"math/rand"

	"github.com/anexia-it/go-e5e"
)

type entrypoints struct{}

func multiply(number int) {
	var result = 2
	for i := 0; i < number; i++ {
		result *= rand.Intn(999)
	}
}

// Test CPU by multiplying random numbers 100 times
func (f *entrypoints) Func_multiply_100(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	multiply(100)

	return &e5e.Return{
		Data: "Hello world!",
	}, nil
}

// Test CPU by multiplying random numbers 100.000 times
func (f *entrypoints) Func_multiply_100000(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	multiply(100000)

	return &e5e.Return{
		Data: "Hello world!",
	}, nil
}

// Test CPU by multiplying random numbers 1.000.000 times
func (f *entrypoints) Func_multiply_1000000(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	multiply(1000000)

	return &e5e.Return{
		Data: "Hello world!",
	}, nil
}

func main() {
	if err := e5e.Start(&entrypoints{}); err != nil {
		panic(err)
	}
}
