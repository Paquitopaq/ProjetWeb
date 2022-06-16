<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaires;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;

class CommentaireController extends Controller
{
    public function postComment(Request $request)
    {
        $this->validate($request, [
            'commentaire' => 'required'
        ]);
        $commentaire = Commentaires::create([
            'ticket_id' => $request->input('ticket_id'),
            'users_id' => Auth::user()->id,
            'commentaire' => $request->input('commentaire'),
            'commentaire_id'=> strtoupper(str_random(10))
        ]);
        
        return redirect()->back()->with("status_ticket", "Votre commentaire a été pris en compte");
    }
}
