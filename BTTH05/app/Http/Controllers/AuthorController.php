<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $authors = Author::paginate(10);
        return view('authors.index', compact('authors'))->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('authors.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        $author = new Author();
        $author->name = $validateData['name'];
        $author->save();
        Session::flash('success', 'Add new author successfull');
        return redirect()->route('authors.index');
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
        $author = Author::find($id);
        return view('authors.edit', $author, compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        $author = Author::find($id);
        $author->name = $validateData['name'];
        $author->save();
        Session::flash('success', 'Edit info author successfull');
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $author = Author::find($id);
        $author->delete();
        Session::flash('success', 'Delete author successfull');
        return redirect()->route('authors.index');
    }
}
