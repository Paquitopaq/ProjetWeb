<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorie;
use Illuminate\Support\Str;
use App\Models\Commentaires;
use App\Mail\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    
    {
        $tickets = Ticket::paginate(10);
        return view('ticket.admin_ticket', compact('tickets'));
    }

    public function test()

    {
        return view('ticket.nouveau');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('ticket.creer_ticket', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'titre' => 'required',
            //'categorie' => 'required',
            'priorite' => 'required',
            'description_probleme' => 'required'
        ]);

        $ticket = new Ticket();
        $ticket-> titre = $request->input('titre');
        $ticket-> users_id = auth()->user()->id;
        $ticket-> ticket_id = strtoupper(str_random(10));
        $ticket-> categorie_id = 1; //$request->input()
        $ticket-> priorite = $request->input("priorite"); 
        $ticket-> status_ticket="Ouvert";     
        $ticket-> description_probleme = $request->input('description_probleme');
        //$request->validate(['piece_jointe'=>'required','image',]);
        //request('piece_jointe')->store('piece_jointe');
        // $ticket-> categorie_id = 5;
        // $ticket-> priorite = "Haute";
        // $ticket-> status_ticket = "ouvert";
        // $ticket-> ticket_id= "55";
        //$ticket-> description_probleme = $request->input('decription_probleme');
        //$ticket-> categorie_id = $request->input('categorie');     
        
        #$mailer->sendTicketInformation(Auth::user(), $ticket);
        $ticket->save();
        
        
        return redirect()->back()->with("status_ticket", "Le ticket: #$ticket->ticket_id a été pris en compte.");
        
    
    }
    // $ticket = new Ticket(
    //     [
    //         'titre' => $request->input('titre'),
    //         'users_id' => Auth::user()->id,
    //         'ticket_id' => strtoupper(str_random(10)),
    //         'categorie_id' => $request->input('categorie'),
    //         'priorité' => $request->input('priorité'),
    //         'description_probleme' => $request->input('description_probleme'),
    //         'status_ticket' => "Ouvert"
    //     ]);
    //     $ticket->save();
    /** *$user = auth()->user()->id;
    *DB::insert("INSERT INTO laravel.tickets (id, titre, users_id,priorité,description_probleme) VALUES (?, ?, ?,?,?);", [$id, $titre, $user,$priorité,$description_probleme]);*/

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_id)
    {   
        // $ticket = Ticket::where('users_id', Auth::user()->id)->paginate(1);
        // $tickets = \DB::table('tickets')->where('ticket_id', $tickets)->get();
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        return view('ticket.display', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return view("home");

    }

    public function userTickets()
    {
        $tickets = Ticket::where('users_id', Auth::user()->id)->paginate(30);
        return view('ticket.user_tickets', compact('tickets'));
    }

    public function close($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $ticket->status_ticket = "Fermé";
        $ticket->save();
        $ticketOwner = $ticket->user;
        return redirect()->back()->with("status_ticket", "Le ticket a été traité");
    
}
   
}