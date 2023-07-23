<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate();

        return view('dashboard.books.index',compact('books'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNotNull('parent_id')->get();
        return view('dashboard.books.create',compact( 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'author_name' => 'required|string',
            'publication_date' => 'required|date',
            'description' => 'required|string',
            'Price' => 'required|numeric',
        ]);
     
        $book = Book::create($request->all());
    
        return redirect()->route('dashboard.books.index')->with('success', 'Book created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
   
        $categories = Category::all();
    
        return view('dashboard.books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'author_name' => 'required|string',
            'publication_date' => 'required|date',
            'description' => 'required|string',
            'Price' => 'required|numeric',
        ]);
    
    
        $book->update($request->all());
    
        return redirect()->route('dashboard.books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        {
  
            $book->delete();
            return redirect()->route('dashboard.books.index')->with('success','Delete done!');
    
        }
    }
}