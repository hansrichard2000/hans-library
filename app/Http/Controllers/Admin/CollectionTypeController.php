<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CollectionType;
use Illuminate\Http\Request;

class CollectionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collectionTypes = CollectionType::all();
        return view('dashboard.collectionTypes.index', compact('collectionTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.collectionTypes.create');
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
            'collectionTypeName' => 'required|max:255',
        ]);

        CollectionType::create($validatedData);

        return redirect()->route('collection-type.index')->with('success', 'Your new collection has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Models\CollectionType $collectionType
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CollectionType $collectionType)
    {
        return view('dashboard.collectionTypes.edit', compact('collectionType'));
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Models\CollectionType  $collectionType
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CollectionType $collectionType)
    {
        $rules = [
            'collectionTypeName' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);

        $collectionType->update([
            'collectionTypeName' => $validatedData['collectionTypeName'],
        ]);

        return redirect()->route('collection-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
