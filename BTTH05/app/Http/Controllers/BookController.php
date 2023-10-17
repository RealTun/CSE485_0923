<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::join('authors', 'authors.id', '=', 'books.author_id')
        ->select('books.*','authors.name as author_name')
        ->paginate(7);
        return view('books.index', compact('books'))->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $authors = Author::all();
        return view('books.add', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'title' => 'required',
            'nameAuthor' => 'required',
        ]);

        $author = Author::where('name', $validateData['nameAuthor'])->first();

        $book = new Book();
        $book->title = $validateData['title'];
        $book->author_id = $author->id;

        $book->save();
        Session::flash('success', 'Add new book sucessful');
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $authors = Author::all();
        $book = Book::find($id);
        $author = Author::find($book->author_id);
        return view('books.edit', ['book' => $book], compact('authors', 'author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData = $request->validate([
            'title' => 'required',
            'nameAuthor' => 'required',
        ]);

        $author = Author::where('name', $validateData['nameAuthor'])->first();
        $book = Book::find($id);

        $book->title = $validateData['title'];
        $book->author_id = $author->id;

        $book->save();
        Session::flash('success', 'Edit info book sucessful');
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $book = Book::find($id);
        $book->delete();
        Session::flash('success', 'Delete book successfull');
        return redirect()->route('books.index');
    }
}
