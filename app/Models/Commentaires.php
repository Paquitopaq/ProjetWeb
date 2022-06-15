<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaires extends Model
{

    use HasFactory;

    
    protected $fillable = [
        'ticket_id', 'users_id', 'commentaire'
    ];
    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket','ticket_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','users_id');
    }
}
