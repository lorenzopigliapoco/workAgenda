<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progetto extends Model
{
    use HasFactory;

    protected $table= 'progettos';
    

    protected $fillable = [
        
        'nome_progetto',
        'descrizione',
        'note',
        'costoOra',
        'dataInizio',
        'dataFine',
        'user_id',
        'ssid_cliente',

    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function client()
    {
        return $this->hasMany('App\Models\Cliente');
    }
    
    public function ticket()
    {
        return $this->hasMany('App\Models\Ticket');
    }
   
   
}
