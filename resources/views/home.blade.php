@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <p>Vous êtes connecté</p>
                    @if(Auth::user()->droit)
                        <p>
                            Voir tous les <a href="{{ url('admin/tickets') }}">tickets</a>
                        </p>
                    @else
                        <p>
                            Voir tous vos <a href="{{ url('mes_tickets') }}">tickets</a> or <a href="{{ url('nouveau-ticket') }}">ouvrir un nouveau ticket</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection