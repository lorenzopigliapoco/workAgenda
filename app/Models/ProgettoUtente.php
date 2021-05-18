<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgettoUtente extends Model
{
    use HasFactory;

    protected $table='progetti_to_users'; 
    protected $primaryKey='numero';
    
    protected $fillable = [
        'progetto_id',
        'utente_id',
    ];
}
