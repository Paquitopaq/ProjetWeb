@extends('layouts.app')

@section('titre', 'All Tickets')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket"> Tickets</i>
                </div>
                <div class="panel-body">
                    @if ($tickets->isEmpty())
                        <p>Aucun tickets.</p>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Categorie</th>
                                <th>Titre</th>
                                <th>Status</th>
                                <th>Dernière mis à jour</th>
                                <th style="text-align:center" colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>
                                        {{ $ticket->categorie->id}}
                                    </td>
                                    <td>
                                        <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                            #{{ $ticket->ticket_id }} - {{ $ticket->titre }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($ticket->status_ticket === 'Ouvert')
                                            <span class="label label-success">{{ $ticket->status_ticket }}</span>
                                        @else
                                            <span class="label label-danger">{{ $ticket->status_ticket }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $ticket->updated_at }}</td>
                                    <td>
                                        @if($ticket->status_ticket === 'Ouvert')
                                            <a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-primary">Commentaire(s)</a>
                                            <form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-danger">Fermé</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $tickets->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection