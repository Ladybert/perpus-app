<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        // return view('devlay.default', [
        //     'publishers' => Publisher::get(),
        // ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('devlay.create-publisher');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3']
        ]);
        $publisher = new Publisher();

        $publisher->name = $request->name;
        $publisher->address = $request->address;

        $publisher->save();

        return redirect()->route('dashboard.index')->with(['success'=>'data kueri berhasil di tambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $publisher = Publisher::find($id);

        return view('devlay.edit-publisher', [
            'publisher' => $publisher,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3']
        ]);
        $publisher = Publisher::find($id);

        $publisher->name = $request->name;
        $publisher->address = $request->address;

        $publisher->save();

        return redirect()->route('dashboard.index')->with(['success'=>'data kueri berhasil di perbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $publisher = Publisher::find($id);
        $publisher->delete();

        return redirect()->route('dashboard.index')->with(['deleted'=>'data kueri berhasil di musnahkan']);
    }
}
