@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class=card>
            <div class="card-header">Liste des utilisateurs</div>
            <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                    <td>{{ $user->id}}</td>
                    <td> {{ $user->name}} </td>
                    <td> {{ $user->email}} </td>
                    <td>
                        <a href="{{route('users.edit',$user->id)}}"><button class="btn btn-primary">Editer</button></a>
                        <form action="{{route('users.destroy',$user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-warning">Supprimer</button>

                    </td>
                    </tr>
                    <br/>

                </tbody>
                </table>
                
                @endforeach
</div>
</div>
</div>
</div>
<div>
@endsection