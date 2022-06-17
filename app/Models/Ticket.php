<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    use HasFactory;

    
    protected $fillable = [
        'users_id', 'categorie_id', 'ticket_id', 'titre', 'priorite', 'description_probleme', 'status_ticket','commentaire'
    ];
    public function categorie()
    {
        return $this->belongsTo('App\Models\Categorie','categorie_id');
    }
    public function commentaire()
    {
        return $this->hasMany('App\Models\Commentaires','commentaire_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','users_id');
    }
}
