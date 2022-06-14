extends('layouts.app')
@section('titre', $ticket->titre)
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    #{{ $ticket->ticket_id }} - {{ $ticket->titre }}
                </div>
                <div class="panel-body">
                    @if (session('status_ticket'))
                        <div class="alert alert-success">
                            {{ session('status_ticket') }}
                        </div>
                    @endif
                    <div class="ticket-info">
                        <p>{{ $ticket->message }}</p>
                        <p>categorie: {{ $ticket->categorie->name }}</p>
                        <p>
                            @if ($ticket->status_ticket === 'Open')
                                Status: <span class="label label-success">{{ $ticket->status_ticket }}</span>
                            @else
                                Status: <span class="label label-danger">{{ $ticket->status_ticket }}</span>
                            @endif
                        </p>
                        <p>Created on: {{ $ticket->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
            <hr>
            @include('tickets.commentaire')
            <hr>
            @include('tickets.reponse')
        </div>
    </div>
@endsection