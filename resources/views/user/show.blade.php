@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Speudo</th>
                    <th scope="col">bio</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($User as $User)
                <tr>
                    <th scope="row">{{$User->id}}</th>
                    <td>{{$User->firstname}}</td>
                    <td>{{$User->lastname}}</td>
                    <td>{{$User->name}}</td>
                    <td>{{$User->bio}}</td>
                    <td>{{$User->email}}</td>
                    <td>
                        <a href="/user/{{$User->id}}/edit" class="btn btn-primary">Modifier</a>
                        <form method="POST" action="{{route('user.destroy', $User->id )}}">
                            @method('DELETE')
                            @csrf
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger delete-user mt-1" value="Supprimer">
                            </div>
                        </form>
{{--                        <a href="{{route('user.destroy',Auth::user())}}"><button type="button" class="btn btn-dark btn-lg btn-block mt-2">Supprimer</button></a>--}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

