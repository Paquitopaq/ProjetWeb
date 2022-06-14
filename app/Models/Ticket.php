<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    use HasFactory;

    
    protected $fillable = [
        'users_id', 'categorie_id', 'ticket_id', 'titre', 'priorité', 'description_probleme', 'status_ticket'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Categorie','categories_id');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Commentaires','commentaires_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','users_id');
    }
}
