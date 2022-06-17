@extends('layouts.app')
@section('titre', 'Ticket Ouvert')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Ouvrir un nouveau ticket</div>
                <div class="panel-body">
                    @if (session('status_ticket'))
                        <div class="alert alert-success">
                            {{ session('status_ticket') }}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('titre') ? ' has-error' : '' }}">
                            <label for="titre" class="col-md-4 control-label">Titre</label>
                            <div class="col-md-6">
                                <input id="titre" type="text" class="form-control" name="titre" value="{{ old('titre') }}">
                                @if ($errors->has('titre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('titre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('categories') ? ' has-error' : '' }}">
                            <label for="categories" class="col-md-4 control-label">Categories</label>
                            <div class="col-md-6">
                                <select id="categories" class="form-control" name="categories">
                                    
                                    @foreach ($categories as $categories)
                                        <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('categories'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('categories') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('priorite') ? ' has-error' : '' }}">
                            <label for="priorite" class="col-md-4 control-label">Priorité</label>
                            <div class="col-md-6">
                                <select id="priorite" type="" class="form-control" name="priorite">
                                    
                                    <option value="low">Basse</option>
                                    <option value="medium">Moyenne</option>
                                    <option value="high">Haute</option>
                                </select>
                                @if ($errors->has('priorite'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('priorite') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description_probleme') ? ' has-error' : '' }}">
                            <label for="description_probleme" class="col-md-4 control-label">Description probleme</label>
                            <div class="col-md-6">
                                <textarea rows="10" id="description_probleme" class="form-control" name="description_probleme"></textarea>
                                @if ($errors->has('description_probleme'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description_probleme') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="section" action="/piece-jointe" method="post" enctype='multipart/form-data'>
                            <div class="field"
                            <label class="label">Nouvel piece jointe</label>
                            <div class="control">
                                <input class="input" type="file" name="avatar">
                            </div>
                            </div>
                            <!-- <div class="field">
                                <div class="control">
                                    <button class="button is-link" type="submit">Piece jointe</button>
                            </div>
                            </div> -->
</div>    
</br>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> Ouvrir un ticket
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection