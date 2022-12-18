<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\CollectionType;
use Illuminate\Http\Request;

class AdminCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::all();
        return view('dashboard.collections.index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collectionTypes = CollectionType::all();
        return view('dashboard.collections.create', compact('collectionTypes'));
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
            'collectionName' => 'required|max:255',
            'collectionCode' => 'required|max:255',
            'collectionAuthor' => 'required|max:255',
            'collectionPublisher' => 'required|max:255',
            'collectionPublishType' => 'required|max:255',
            'collectionType' => 'required',
            'collectionImage' => 'image|file|max:2048',
            'collectionDesc' => 'required',
        ]);

        if($request->file('collectionImage')){
            $validatedData['collectionImage'] = $request->file('collectionImage')->store('collectionImages');
        }

        Collection::create([
            'collectionCode' => $validatedData['collectionCode'],
            'collectionName' => $validatedData['collectionName'],
            'collectionAuthor' => $validatedData['collectionAuthor'],
            'collectionPublishYear' => $validatedData['collectionPublishYear'],
            'collectionDesc' => $validatedData['collectionDesc'],
            'collectionTypeID' => $validatedData['collectionType'],
            'collectionStatusID' => '1'
        ]);

        return redirect()->route('collections.index')->with('success', 'Your new post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collectionShow = Collection::where('id', $id)->first();

        if ($collectionShow == null){
            abort(404);
        }

        return view('catalog.show', compact('collectionShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collection = Collection::findOrFail($id);
        $collection->delete();

        return redirect()->route('collections.index')->with('success', 'Your post has been deleted!');
    }
}
