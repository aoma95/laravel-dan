<?php

namespace App\Http\Controllers;

use App\SkillUser;

//use DebugBar\DebugBar;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use App\Skill;
use App\User;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    //
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, User $user)
    {
//        $this->authorize('store',$user->getEmail());
//        $this->authorize('store', $user);
        $request->validate([
            'Skill'=>'required',
        ]);

        $Us = User::find($request->post("id"));
        $skill= Skill::find($request->post("Skill"));
        $Us->skills()->attach($skill, array('level' => 0));
        $id=$request->post("id");
        $redi ="/skill/$id/edit";
        return redirect($redi);

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
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id,User $user)
    {
        //
        $this->authorize('edit',$user);
        $userSkill = User::find($id);
        $skillsId=[];
        foreach ($userSkill->skills()->get() as $element){
            array_push($skillsId,$element->id);
        }
        return view('skill.edit',compact('skillsId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, $id,User $user)
    {
        $this->authorize('update',$user);
       foreach ($request->except('_token') as $idSkill =>$value){
           $user = User::find($id);
           $skill= Skill::find($idSkill);

           $user->skills()->updateExistingPivot($skill, array('level' => $value), false);
       }
//        $redi ="/skill/$id/edit";
        return redirect('/home');
       // return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * *
     * @param User $users
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(User $users, Request $request,$id)
    {
        //
//        $this->authorize('delete',$users);
        $request->validate([
            'Skill'=>'required',
        ]);
        $user = User::find($id);
        $user->skills()->detach($request->post("Skill"));
        $redi ="/skill/$id/edit";
        return redirect($redi);
    }
}
