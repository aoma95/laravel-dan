<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $id
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(User $id)
    {
        //
        $this->authorize('edit', $id);
        $user = User::find($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     * @throws AuthorizationException
     */

    public function update(Request $request,User $user)
    {
        $this->authorize('update', $user);
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'bio'=>'required',
            'name'=>'required',
            'email'=>'required'
        ]);
        $userChange = User::find($user->id);
        $userChange->firstname = $request->get('firstname');
        $userChange->lastname = $request->get('lastname');
        $userChange->bio = $request->get('bio');
        $userChange->name = $request->get('name');
        $userChange->email= $request->get('email');
        $userChange->save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
    }
}
