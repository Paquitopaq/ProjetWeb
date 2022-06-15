<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support Ticket</title>
</head>
<body>
<p>
    {{ $commentaire->commentaire }}
</p>
---
<p>Replied by: {{ $user->name }}</p>
<p>Title: {{ $ticket->titre }}</p>
<p>Ticket ID: {{ $ticket->ticket_id }}</p>
<p>Status: {{ $ticket->status_ticket }}</p>
<p>
    You can view the ticket at any time at {{ url('ticket/'. $ticket->ticket_id) }}
</p>
</body>
</html>