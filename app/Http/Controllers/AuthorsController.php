<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        // Buat query pencarian
        $search = Books::where('title', 'like', '%' . $query . '%')
                        ->orWhere('author_id', 'like', '%' . $query . '%')
                        ->paginate(2); // Paginasi hasil pencarian

        return view('devlay.data', compact('search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('devlay.create-author');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            // 'photo' => ['image'],
        ]);
        
        if($request->hasFile('photo')){
            $photo = $request->file('photo')->store('authorImg');
        }

        $author = new Authors();

        $author->name = $request->name;
        $author->photo = $photo;

        $author->save();

        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Authors $authors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Authors $authors, $id)
    {
        $author = Authors::find($id);

        return view('devlay.edit-author',[
            'author' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Authors $authors, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'photo' => ['image'],
        ]);
        $author = Authors::find($id);

        if($request->hasFile('photo')){

            if(Storage::exists('authorImg/' . $author->photo)) {
                Storage::delete('authorImg/' . $author->photo);
            }
            
            $photo = $request->file('photo')->store('authorImg');
            $author->photo = $photo;
        }

        $author->name = $request->name;

        $author->save();

        return redirect()->route('dashboard.index')->with('success','data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Authors $authors, $id)
    {
        $author = Authors::find($id);

        $author->delete();

        return redirect()->route('dashboard.index');
    }
}
