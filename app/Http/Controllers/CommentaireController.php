<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;

class CommentaireController extends Controller
{
    public function postComment(Request $request)
    {
        $this->validate($request, [
            'commentaire' => 'required'
        ]);
        $commentaire = Commentaire::create([
            'ticket_id' => $request->input('ticket_id'),
            'user_id' => Auth::user()->id,
            'commentaire' => $request->input('commentaire')
        ]);
        
        return redirect()->back()->with("status_ticket", "Votre commentaire a été pris en compte");
    }
}
