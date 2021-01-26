/*
 * The following functions test the read and write rights
 */

package main

import (
	"log"
	"os"

	"github.com/anexia-it/go-e5e"
)

type entrypoints struct{}

// Create file in current folder "func_code" (read-only)
func (f *entrypoints) Func_save_textfile_func_code(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	// If the file doesn't exist, create it, or append to the file
	fi, err2 := os.OpenFile("text.log", os.O_APPEND|os.O_CREATE|os.O_WRONLY, 0644)
	if err2 != nil {
		log.Println(err2)
	}
	defer fi.Close()

	if _, err2 := fi.WriteString("text to append\n"); err2 != nil {
		log.Println(err2)
	}

	return &e5e.Return{
		Data: "Hello World!",
	}, nil
}

// Create file in subfolder of "func_code" (read-only)
func (f *entrypoints) Func_save_textfile_func_code_subfolder(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	//Create a folder/directory at a full qualified path
	err := os.Mkdir("subfolder", 0755)
	if err != nil {
		log.Fatal(err)
	}

	// If the file doesn't exist, create it, or append to the file
	fi, err2 := os.OpenFile("subfolder/text.log", os.O_APPEND|os.O_CREATE|os.O_WRONLY, 0644)
	if err2 != nil {
		log.Println(err2)
	}
	defer fi.Close()

	if _, err2 := fi.WriteString("Text appened to this file.\n"); err2 != nil {
		log.Println(err2)
	}

	return &e5e.Return{
		Data: "Hello World!",
	}, nil
}

// Create file one folder above "func_code" (read and write)
func (f *entrypoints) Func_save_textfile_above(event e5e.Event, context e5e.Context) (*e5e.Return, error) {
	// If the file doesn't exist, create it, or append to the file
	fi, err2 := os.OpenFile("../../text.log", os.O_APPEND|os.O_CREATE|os.O_WRONLY, 0644)
	if err2 != nil {
		log.Println(err2)
	}
	defer fi.Close()

	if _, err2 := fi.WriteString("Text appened to this file.\n"); err2 != nil {
		log.Println(err2)
	}

	return &e5e.Return{
		Data: "Hello World!",
	}, nil
}
func main() {
	if err := e5e.Start(&entrypoints{}); err != nil {
		panic(err)
	}
}
