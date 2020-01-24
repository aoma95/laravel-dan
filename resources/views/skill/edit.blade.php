@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Modifier niveaux de Compétence</div>
                    <div class="card-body">
                        <form method="POST" class="form" name="formulaire" action="{{route('skill.update', Auth::user()->id)}}">
                            @method('PATCH')
                            @csrf
                            @foreach (Auth::user()->skills()->get() as $skill)
                                <div class="form-group col-md-12">
                                    <label for="name">{{$skill->name}} level :</label>
                                    <select name="{{$skill->id}}" class="form-control">
                                        @for($i = 1; $i < 6; $i++)
                                            @if($skill->pivot->level===$i)
                                                <option selected value="{{$i}}">{{$skill->pivot->level}}</option>
                                                @else
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endif
                                        @endfor
                                    </select>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-dark btn-lg btn-block mt-1">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Suppression de Compétence</div>
                    <div class="card-body">
                        <form method="POST" class="form" name="deleteSkill" action="{{route('skill.destroy', Auth::user()->id)}}">
                            @method('DELETE')
                            @csrf
                            <div class="form-group col-md-12">
                                <select name="Skill" class="form-control">
                                    <option selected disabled>Compétence à supprimer</option>
                                    @foreach (Auth::user()->skills()->get() as $skill)
                                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-dark btn-lg btn-block mt-1">Suprimmer</button>
                        </form>
                    </div>
                </div>
                <div class="card mt-1">
                    <div class="card-header">Ajout de Compétence</div>
                    <div class="card-body">
                        <form method="POST" class="form" name="ajoutSkill" action="{{route('skill.store')}}">
                            @csrf
                            <div class="form-group col-md-12">
                                <input type="hidden" id="id" name="id" value="{{Auth::user()->id}}" />
                                <select name="Skill" class="form-control">
                                    <option selected disabled>Compétence à ajouter</option>
                                    @foreach(\App\Skill::all()->whereNotIn('id', $skillsId) as $skill)
                                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-dark btn-lg btn-block mt-1">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
