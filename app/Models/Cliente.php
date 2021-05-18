<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'ssid';
    
    protected $fillable=[
        'ragSoc',
        'nomeRef',
        'cognomeRef',
        'emailRef',
        'ssid',
        'PEC',
        'PIVA'
    ];
}
