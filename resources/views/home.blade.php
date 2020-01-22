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
                    <a href="{{route('user.edit',Auth::user()->id)}}"><button type="button" class="btn btn-dark btn-lg btn-block mt-1">Modifier</button></a>
{{--                    <a href="{{route('user.edit'}}"><button type="button" class="btn btn-dark btn-lg btn-block mt-1">Modifier</button></a>--}}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Compétence</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        {{Auth::user()->skills()->get()}}
                        @foreach (Auth::user()->skills()->get() as $skill)
                            <il>{{ $skill->name }} : {{$skill->pivot->level}}</il>
                        @endforeach
{{--                        <li class="list-group-item">Prénom : {{Auth::user()->skills()->get()}}</li>--}}
                    </ul>
{{--                    <a href="{{route('user.edit',Auth::user()->id)}}"><button type="button" class="btn btn-dark btn-lg btn-block mt-1">Modifier</button></a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
