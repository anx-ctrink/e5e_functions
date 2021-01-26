/*
 * The following functions test the cpu (quota cpu)
 */

package main

import (
	"math/rand"

	"github.com/anexia-it/go-e5e"
)

type entrypoints struct{}

// Test CPU by multiplying random numbers 100 times
func (f *entrypoints) Func_multiply_100(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	var number = 2
	for i := 0; i < 100; i++ {
		number *= rand.Intn(999)
	}

	return &e5e.Return{
		Data: "Hello world!",
	}, nil
}

// Test CPU by multiplying random numbers 100.000 times
func (f *entrypoints) Func_multiply_100000(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	var number = 2
	for i := 0; i < 100000; i++ {
		number *= rand.Intn(999)
	}

	return &e5e.Return{
		Data: "Hello world!",
	}, nil
}

// Test CPU by multiplying random numbers 1.000.000 times
func (f *entrypoints) Func_multiply_1000000(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	var number = 2
	for i := 0; i < 1000000; i++ {
		number *= rand.Intn(999)
	}

	return &e5e.Return{
		Data: "Hello world!",
	}, nil
}

func main() {
	if err := e5e.Start(&entrypoints{}); err != nil {
		panic(err)
	}
}
