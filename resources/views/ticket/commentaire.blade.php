<div class="commentaires">
    @foreach($ticket->commentaires as $commentaire)
        <div class="panel panel-@if($ticket->user->id === $commentaire->user_id){{"default"}}@else{{"success"}}@endif">
            <div class="panel panel-heading">
                {{ $commentaire->user->name }}
                <span class="pull-right">{{ $commentaire->created_at->format('Y-m-d') }}</span>
            </div>
            <div class="panel panel-body">
                {{ $commentaire->commentaire }}
            </div>
        </div>
    @endforeach
</div>