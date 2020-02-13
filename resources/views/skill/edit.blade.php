@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(auth()->user()->role ==='user')
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Modifier niveaux de Compétence</div>
                        <div class="card-body">
                            <form method="POST" class="form" name="formulaire" action="{{route('skill.update', Auth()->user()->id)}}">
                                @method('PATCH')
                                @csrf
                                @foreach (Auth()->user()->skills()->get() as $skill)
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
                            <form method="POST" class="form" name="deleteSkill" action="{{route('skill.destroy', Auth()->user())}}">
                                @method('DELETE')
                                @csrf
                                <div class="form-group col-md-12">
                                    <select name="Skill" class="form-control">
                                        <option selected disabled>Compétence à supprimer</option>
                                        @foreach (Auth()->user()->skills()->get() as $skill)
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
                            <form method="POST" class="form" name="ajoutSkill" action="{{route('skill.store',Auth()->user())}}">
                                @csrf
                                <div class="form-group col-md-12">
                                    <input type="hidden" id="id" name="id" value="{{Auth()->user()->id}}" />
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
            @endif
            @if(auth()->user()->role ==='admin')
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Liste des comptence</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Logo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(\App\Skill::all() as $skill)
                                        <tr>
                                            <td>{{$skill->name}}</td>
                                            <td>{{$skill->description}}</td>
                                            <td>{{$skill->logo}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Supprimer compétence</div>
                            <div class="card-body">
                                <form method="POST" class="form" name="deleteSkill" action="{{route('skill.update',Auth()->user())}}">
                                    @method('DELETE')
                                    @csrf
                                        <div class="form-group col-md-12">
                                            <label for="name">Compétence :</label>
                                            <select name="id" class="form-control">
                                                <option selected disabled value="">Choisir la compétence</option>
                                                @foreach (\App\Skill::all() as $skill)
                                                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    <button type="submit" class="btn btn-dark btn-lg btn-block mt-1">Supprimer</button>
                                </form>
                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-header">Ajout Compétence</div>
                            <div class="card-body">
                                <form method="POST" class="form" name="formulaire" action="{{route('user.update', Auth()->user()->id)}}">
                                    @method('CREATE')
                                    @csrf
                                <div class="form-group">
                                    <label for="firstname">Nom compétence :</label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                    <div class="form-group">
                                        <label for="firstname">Description compétence :</label>
                                        <input type="text" class="form-control" name="name" value="">
                                    </div>
                                <div class="form-group row">
                                    <label for="profile_image" class="col-md-4 col-form-label text-md-right">Logo Compétence</label>
                                    <div class="col-md-6">
                                        <input id="logo_competence" type="file" class="form-control pb-1" name="logo_competence">
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-dark btn-lg btn-block mt-1">Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
        </div>
    </div>
@endsection
