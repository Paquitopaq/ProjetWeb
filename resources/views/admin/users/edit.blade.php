
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class=card>
            <div class="card-header">Modifier</div><thead>
                    <tr>
                    <trequirednameh scope="col">#|</th>
                    <th scope="col">Nom|</th>
                    <th scope="col">Email|</th>
                    <th scope="col">Droit(0 = admin, 1 = user, 2=dev)|</th>
                    </tr>
                </thead></div>
                <div class="card-body">
                    <div class="form-group">
                        <tr>
                        <th scope="col">{{$user->id}}|</th>
                        <th scope="col">{{$user->name}}|</th>
                        <th scope="col">{{$user->email}}|</th>
                        <th scope="col">{{$user->droit}}</th>
                        </tr>

                        <form action={{ route('users.edit', $user) }} method="POST">
                            @csrf
                            @method('PATCH')
                        

                            <div class="form-group mb-3">
                                <label for="">Utilisateur Name</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Utilisateur Email</label>
                                <input type="text" name="email" value="{{$user->email}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Utilisateur Droit</label>
                                <input type="text" name="course" value="{{$user->droit}}" class="form-control">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Editer</button>

                        </form>
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
