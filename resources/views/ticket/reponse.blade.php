<div class="panel panel-default">
    <div class="panel-heading">Ajouter une réponse</div>
        <div class="panel-body">
            <div class="commentaire-form">
                <form action="{{ url('commentaire') }}" method="POST" class="form">
                    {!! csrf_field() !!}
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                    <div class="form-group{{ $errors->has('commentaire') ? ' has-error' : '' }}">
                        <textarea rows="10" id="commentaire" class="form-control" name="commentaire"></textarea>
                        @if ($errors->has('commentaire'))
                            <span class="help-block">
                               <strong>{{ $errors->first('commentaire') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ok</button>
                    </div>
                </form>
            </div>
        </div>
</div>