<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\CollectionType;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'collectionPublishYear' => 'required|max:255',
            'collectionType' => 'required',
            'collectionImage' => 'image',
            'collectionDesc' => 'required',
        ]);

        if($request->file('collectionImage')){
            $validatedData['collectionImage'] = $request->file('collectionImage')->store('collectionImages');
        }

        Collection::create([
            'collectionCode' => $validatedData['collectionCode'],
            'collectionName' => $validatedData['collectionName'],
            'collectionAuthor' => $validatedData['collectionAuthor'],
            'collectionPublisher' => $validatedData['collectionPublisher'],
            'collectionPublishYear' => $validatedData['collectionPublishYear'],
            'collectionDesc' => $validatedData['collectionDesc'],
            'collectionTypeID' => $validatedData['collectionType'],
            'collectionImage' => $validatedData['collectionImage'],
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
     * @param \App\Models\Collection  $collection
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        $collectionTypes = CollectionType::all();
        return view('dashboard.collections.edit', compact('collection', 'collectionTypes'));
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Models\Collection  $collection
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        $rules = [
            'collectionName' => 'required|max:255',
            'collectionCode' => 'required|max:255',
            'collectionAuthor' => 'required|max:255',
            'collectionPublisher' => 'required|max:255',
            'collectionPublishYear' => 'required|max:255',
            'collectionType' => 'required',
            'collectionImage' => 'image',
            'collectionDesc' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('collectionImage')){
            if ($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['collectionImage'] = $request->file('collectionImage')->store('collectionImage');
        }

        $collection->update([
            'collectionCode' => $validatedData['collectionCode'],
            'collectionName' => $validatedData['collectionName'],
            'collectionAuthor' => $validatedData['collectionAuthor'],
            'collectionPublisher' => $validatedData['collectionPublisher'],
            'collectionPublishYear' => $validatedData['collectionPublishYear'],
            'collectionDesc' => $validatedData['collectionDesc'],
            'collectionTypeID' => $validatedData['collectionType'],
            'collectionImage' => $validatedData['collectionImage'],
            'collectionStatusID' => '1'
        ]);

        return redirect()->route('collections.index')->with('success', 'Your collection has been updated!');
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

        $loans = Loan::where('collectionID','=',$id)->get();

        foreach ($loans as $loan){
            $loan->delete();
        }

        return redirect()->route('collections.index')->with('success', 'Your post has been deleted!');
    }
}
