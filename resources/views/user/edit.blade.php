@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Information Personnelle</div>
                    <div class="card-body">
                                <form method="POST" class="form" name="formulaire" action="{{route('user.update', Auth()->user()->id)}}">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-group">
                                        <label for="firstname">Prénom</label>
                                        <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Nom</label>
                                        <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="bio">Biographie</label>
                                        <input type="text" class="form-control" name="bio" value="{{$user->bio}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Surnom</label>
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-lg btn-block mt-1">Modifier</button>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
