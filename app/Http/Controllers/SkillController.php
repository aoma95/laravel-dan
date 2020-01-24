<?php

namespace App\Http\Controllers;

use App\SkillUser;
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
     * @param  \Illuminate\Http\Request  $request
     * * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Skill'=>'required',
        ]);
        $user = User::find($request->post("id"));
        $skill= Skill::find($request->post("Skill"));
        $user->skills()->attach($skill, array('level' => 0));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $skillsId=[];
        foreach ($user->skills()->get() as $element){
            array_push($skillsId,$element->id);
        }
        return view('skill.edit',compact('skillsId'));
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
       foreach ($request->except('_token') as $idSkill =>$value){
           $user = User::find($id);
           $skill= Skill::find($idSkill);

           $user->skills()->updateExistingPivot($skill, array('level' => $value), false);
       }
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $request->validate([
            'Skill'=>'required',
        ]);
        $user = User::find($id);
        $user->skills()->detach($request->post("Skill"));
        $redi ="/skill/$id/edit";
        return redirect($redi);
    }
}
