<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Loan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use voku\helper\ASCII;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::orderBy('id', 'DESC')->get();
        return view('dashboard.loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('roleID','=',2)->get();
        $collections = Collection::where('collectionStatusID','=','1')->get();
        return view('dashboard.loans.create',compact('users', 'collections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dateNow = Carbon::now();
        Loan::create([
            'userID' => $request->name,
            'collectionID' => $request->collectionID,
            'is_approved' => '1',
            'loan_date' => Carbon::now(),
            'expiration_date' => $dateNow->addDays(7),
        ]);

        $collection = Collection::findOrFail($request->collectionID);

        $collection->update([
            'collectionStatusID' => 2
        ]);

        return redirect()->route('loans.index')->with('success', 'Your new post has been added!');
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
     * @param  \App\Models\Loan  $loan
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        $users = User::where('roleID','=',2)->get();
        $collections = Collection::all();
        return view('dashboard.loans.edit', compact('loan', 'users', 'collections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {

        $loan->update([
            'userID' => $request->name,
            'collectionID' => $request->collectionID,
        ]);

        return redirect()->route('loans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reject(Request $request){

        $task = Loan::findOrFail($request->id);
        $collection = Collection::where('id','=',$task->collectionID)->first();
        $task->update([
            'is_approved' => '2',
            'loan_date' => null,
            'expiration_date' => null,
        ]);
        $collection->update([
            'collectionStatusID' => 1
        ]);
        return redirect()->back();
    }
//
//    /**
//     * Update the specified resource in storage.
//     * @param  \App\Models\Loan  $loan
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function approve(Request $request){

        $dateNow = Carbon::now();
        $task = Loan::findOrFail($request->id);
//        ddd($task);
        $collection = Collection::where('id','=',$task->collectionID)->first();
        $task->update([
            'is_approved' => '1',
            'loan_date' => Carbon::now(),
            'expiration_date' => $dateNow->addDays(7),
        ]);
        $collection->update([
            'collectionStatusID' => 2
        ]);
        return redirect()->back();
    }

    public function expire(Request $request){
        $task = Loan::findOrFail($request->id);
//        ddd($task);
        $collection = Collection::where('id','=',$task->collectionID)->first();
        $task->update([
            'is_approved' => '3',
        ]);
        $collection->update([
            'collectionStatusID' => 1
        ]);
        return redirect()->back();
    }
}
