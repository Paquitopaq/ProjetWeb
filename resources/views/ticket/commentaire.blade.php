<div class="comments">
    
    @foreach($ticket->commentaire as $commentaire)
    <div class="panel panel-@if($ticket->user->id === $comment->user_id){{"default"}}@else{{"success"}}@endif">
            <div class="panel panel-heading">
                {{ $commentaire->commentaire->name }}
                <span class="pull-right">{{ $commentaire->created_at->format('d-m-Y') }}</span>
            </div>
            <div class="panel panel-body">
                {{ $commentaire->commentaire }}
            </div>
        </div>
    @endforeach
</div>
