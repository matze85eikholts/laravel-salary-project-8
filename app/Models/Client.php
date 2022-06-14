<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = ['client_name',
    'city',
    'client_ITN',
    'legal_address',
    'physical_address',
    'capital',
    'client_bank',
    'client_bank_account',
    ];
}
