<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ApiController extends Controller
{
    public function index() {
        return Book::select('*')->get();
    }

    public function create(Request $request) {
        $this->validate($request, [ //inputs are not empty or null

            'name' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'sinopsis' => 'required',
            'restriction' => 'required',
            'main' => 'required',
            'secondary' => 'required',
        ]);

        $books = new Book;

        $books->name = $request->input('name'); //retrieving user inputs
        $books->author = $request->input('author');  //retrieving user inputs
        $books->genre = $request->input('genre');  //retrieving user inputs
        $books->sinopsis = $request->input('sinopsis'); //retrieving user inputs
        $books->restriction = $request->input('restriction');  //retrieving user inputs
        $books->main = $request->input('main');  //retrieving user inputs
        $books->secondary = $request->input('secondary');  //retrieving user inputs

        return $books; //returns the stored value if the operation was successful.
    }

    public function store(Request $request)
    {
        $this->validate($request, [ //inputs are not empty or null

            'name' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'sinopsis' => 'required',
            'restriction' => 'required',
            'main' => 'required',
            'secondary' => 'required',
        ]);

        $books = new Book;

        $books->name = $request->input('name'); //retrieving user inputs
        $books->author = $request->input('author');  //retrieving user inputs
        $books->genre = $request->input('genre');  //retrieving user inputs
        $books->sinopsis = $request->input('sinopsis'); //retrieving user inputs
        $books->restriction = $request->input('restriction');  //retrieving user inputs
        $books->main = $request->input('main');  //retrieving user inputs
        $books->secondary = $request->input('secondary');  //retrieving user inputs
        $books->save(); //storing values as an object
        return $books; //returns the stored value if the operation was successful.
    }

    public function show($id)
    {
        return Book::findorFail($id); //searches for the object in the database using its id and returns it.
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ //inputs are not empty or null

            'name' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'sinopsis' => 'required',
            'restriction' => 'required',
            'main' => 'required',
            'secondary' => 'required',
        ]);

        $books = Book::findorFail($id);
        $books->name = $request->input('name'); //retrieving user inputs
        $books->author = $request->input('author');  //retrieving user inputs
        $books->genre = $request->input('genre');  //retrieving user inputs
        $books->sinopsis = $request->input('sinopsis'); //retrieving user inputs
        $books->restriction = $request->input('restriction');  //retrieving user inputs
        $books->main = $request->input('main');  //retrieving user inputs
        $books->secondary = $request->input('secondary');  //retrieving user inputs
        $books->save(); //storing values as an object
        $books->save(); //storing values as an object
        return $books; //returns the stored value if the operation was successful.
    }

    public function destroy($id)
    {
        $books = Book::findorFail($id);
        if ($books->delete()){
            return 'deleted succesfully';
        }
    }
}
