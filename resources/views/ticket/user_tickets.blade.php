@extends('layouts.app')

@section('titre', 'Mes tickets')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket">Mes tickets</i>
                </div>
                <div class="panel-body">
                    @if($ticket->isEmpty())
                        <p>Vous n'avez aucun ticket en cours</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Categorie</th>
                                    <th>Titre</th>
                                    <th>Status</th>
                                    <th>Dernère mis à jour</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ticket as $ticket)
                                    <tr>
                                        <td>
                                            {{ $ticket->categorie->name }}
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->ticket_id) }}">
                                                #{{ $ticket->ticket_id }} - {{ $ticket->titre }}
                                            </a>
                                        </td>
                                        <td>
                                            @if($ticket->status_ticket == "Open")
                                                <span class="label label-success">{{ $ticket->status_ticket }}</span>
                                            @else
                                                <span class="label label-danger">{{ $ticket->status_ticket }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $ticket->updated_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $ticket->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection