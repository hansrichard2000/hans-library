<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\CollectionType;
use App\Models\Loan;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::latest()->filter(request(['search']))->paginate(7)->withQueryString();

//        if (request('search')){
//            $collections->where('collectionName', 'like', '%'.request('search').'%');
//        }

        $collectionTypes = CollectionType::all();
        return view('catalog.index', compact('collections', 'collectionTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->guest()){
            return redirect()->route('login');
        }
        $user = Auth::user();
        $collections = Collection::where('collectionStatusID','=','1')->get();
        return view('catalog.create', compact('user', 'collections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Loan::create([
           'userID' => $request->userID,
           'collectionID' => $request->collectionID,
           'is_approve' => '0',
            'loan_date' => null,
            'expiration_date' => null
        ]);

        return redirect()->route('my-loan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        $collectionShow = Collection::where('id', $collection->id)->first();

        if ($collectionShow == null){
            abort(404);
        }

        return view('catalog.show', compact('collectionShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        //
    }
}
