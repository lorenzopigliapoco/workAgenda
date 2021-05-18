<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    
    protected $table = 'tickets';

    protected $primaryKey= 'id';

    protected $fillable = [
        'id',
        'data',
        'progetto',
        'ore_spese',
        'note',
        'utente'
    ];

    public function progetto()
    {
        return $this->belongsTo('App\Models\Progetto');
    }
    
    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
}
