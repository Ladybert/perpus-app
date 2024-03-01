<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Publisher;
use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    //     // Buat query pencarian
    //     $input = Books::where('title', 'like', '%' . $query . '%')
    //                     ->orWhere('author_id', 'like', '%' . $query . '%')
    //                     ->paginate(2); // Paginasi hasil pencarian

    //     return view('devlay.data', compact('input'));
    // }
    public function index()
    {
        if(request()->has('query')){
            // Buat query pencarian
            $input = Books::where('title', 'like', '%' . request('query') . '%')
                            ->orWhere('year', 'like', '%' . request('query') . '%')
                            ->orWhereHas('Authors', function($query){
                                $query->where('name', 'like', '%' . request('query') . '%');
                            })
                            ->paginate(10); // Paginasi hasil pencarian
        }
        else(
            $input = Books::paginate(10)
        );
        return view('devlay.default', compact('input'),[
            'books' => Books::paginate(10),
            'authors' => Authors::get(),
            'publishers' => Publisher::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('devlay.create-book', [
            'authors' => Authors::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'author_id' => 'required',
            'title' => ['required', 'min:3'],
            'cover' => ['image'],
            'year' => 'required',
        ]);

        if($request->hasFile('cover')){
            $cover = $request->file('cover')->store('coverImg');
        }

        $book = new Books();

        $book->author_id = $request->author_id;
        $book->title = $request->title;
        $book->cover = $cover;
        $book->year = $request->year;

        $book->save();

        return redirect()->route('dashboard.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Books $books, $id)
    {
        $books = Books::findOrFail($id);

        return view('devlay.show', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books ,$id)
    {
        $book = Books::find($id);
        $authors = Authors::all();
        return view('devlay.edit-book', [
            'book' => $book,
            'authors' => $authors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request, Books $books)
    {
        $this->validate($request, [
            'author_id' => 'required',
            'title' => ['required', 'min:3'],
            'cover' => ['required'],
            'year' => ['required','numeric'],
        ]);

        if($request->hasFile('cover')){
            $cover = $request->file('cover')->store('coverImg');
        }

        $book = Books::find($id);

        $book->author_id = $request->author_id;
        $book->title = $request->title;
        $book->cover = $cover;
        $book->year = $request->year;

        $book->save();

        return redirect()->route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Books $books)
    {
        $book = Books::find($id);

        $book->delete();

        return redirect()->route('dashboard.index');
    }

}
