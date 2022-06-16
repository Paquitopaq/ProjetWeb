<?php

// namespace App\Mail;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Mail\Mailable;
// use Illuminate\Queue\SerializesModels;
// use App\Models\Ticket;

// class Mail extends Mailable
// {
//     public $mailer;
//     public $fromAddress = 'support@supportticket.dev';
//     public $fromName = 'Support Ticket';
//     public $to;
//     public $sujet;
//     public $view;
//     public $donnees = [];
//     /**
//      * Mail constructor.
//      * @param $mail
//      */
//     public function __construct(Mail $mailer)
//     {
//         $this->mailer = $mailer;
//     }
//     public function sendTicketInformation($user, Ticket $ticket)
//     {
//         $this->to = $user->email;
//         $this->suject = "[Ticket ID: $ticket->ticket_id] $ticket->title";
//         $this->view = 'ticket.info_ticket';
//         $this->donnees = compact('user', 'ticket');
//         return $this->deliver();
//     }
//     public function sendTicketComments($ticketOwner, $user, Ticket $ticket, $comment)
//     {
//         $this->to = $ticketOwner->email;
//         $this->subject = "RE: $ticket->titre (Ticket ID: $ticket->ticket_id)";
//         $this->view = 'ticket.commentaire';
//         $this->data = compact('ticketOwner', 'user', 'ticket', 'commentaire');
//         return $this->deliver();
//     }
//     public function sendTicketStatusNotification($ticketOwner, Ticket $ticket)
//     {
        
//     }
//     public function deliver()
//     {
//         $this->mailer->send($this->view, $this->donnees, function($message){
//             $message->from($this->fromAddress, $this->fromName)
//                     ->to($this->to)->suject($this->suject);
//         });
//     }
// }