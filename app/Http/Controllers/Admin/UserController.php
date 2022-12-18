<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Loan;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Controller for Daftar Pengguna Page
 *
 * @author Hans Richard Alim Natadjaja
 * * @version 1.0, 18/12/22
 */

class UserController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | UserController
    |--------------------------------------------------------------------------
    |
    | This controller handles for the application and
    | redirecting to User List Management. The controller uses a resource convention
    | based from Laravel to conveniently provide its functionality for CRUD.
    |
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::where('roleID','=',2)->get();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone' => $request['phone'],
            'address' => $request['address'],
            'roleID' => $request['role'],
            'is_active' => '1',
            'is_login' => '0'

        ]);

        return redirect()->route('users.index');
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
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
        ];

        $validatedData = $request->validate($rules);

        $user->update([
            'name' => $validatedData['name'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'roleID' => $request['role']
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $loans = Loan::where('userID','=',$id)->get();

        if ($loans->count()){
            foreach ($loans as $loan){
                $collections = Collection::where('id', '=', $loan->collectionID)->get();
                foreach ($collections as $collection){
                    $collection->update([
                        'collectionStatusID' => 1
                    ]);
                }
                $loan->delete();
            }
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('collections.index')->with('success', 'User has been deleted!');
    }

    /**
     * Function bellow not applicable for now...
     *
     */

//    public function suspend(Request $request){
//        $user = User::findOrFail($request->id);
//        $user->update(['is_active' => '0']);
//        return redirect()->back();
//    }
//
//    public function active(Request $request){
//        $user = User::findOrFail($request->id);
//        $user->update(['is_active' => '1']);
//        return redirect()->back();
//    }
}
