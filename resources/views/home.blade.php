@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Information Personnelle</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Prénom : {{Auth::user()->firstname}}</li>
                        <li class="list-group-item">Nom : {{Auth::user()->lastname}}</li>
                        <li class="list-group-item">Biographie : {{Auth::user()->bio}}</li>
                        <li class="list-group-item">Surnom : {{Auth::user()->name}}</li>
                        <li class="list-group-item">Email : {{Auth::user()->email}}</li>
                    </ul>
                    <a href="{{route('user.edit',Auth::user())}}"><button type="button" class="btn btn-dark btn-lg btn-block mt-1">Modifier</button></a>
                </div>
            </div>
        </div>
        @if (auth()->user()->role ==='user')
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Compétence</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach (Auth::user()->skills()->get() as $skill)
                            <il>{{ $skill->name }} : level {{$skill->pivot->level}}<div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: {{$skill->pivot->level*20}}%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5"></div>
                                </div></il>
                        @endforeach
                    </ul>
                    <a href="{{route('skill.edit',Auth::user()->id)}}"><button type="button" class="btn btn-dark btn-lg btn-block mt-2">Modifier</button></a>
                </div>
            </div>
        </div>
        @endif
        @if (auth()->user()->role ==='admin')
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Les utilisateurs</div>
                    <div class="card-body">
                        <a href="{{route('user.index')}}"><button type="button" class="btn btn-dark btn-lg btn-block mt-2">Voir tout les utilisateurs</button></a>
                    </div>
                </div>
                <div class="card mt-1">
                    <div class="card-header">Les Compétences</div>
                    <div class="card-body">
                        <a href="{{route('skill.edit',Auth::user())}}"><button type="button" class="btn btn-dark btn-lg btn-block mt-2">Modifier les compétences</button></a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
