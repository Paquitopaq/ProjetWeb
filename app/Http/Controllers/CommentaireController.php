<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use Illuminate\Support\Facades\Auth;

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
        // send mail if the user commentairing is not the ticket owner
        if($commentaire->ticket->user->id !== Auth::user()->id) {
           
        }
        return redirect()->back()->with("status_ticket", "Your commentaire has be submitted.");
    }
}
