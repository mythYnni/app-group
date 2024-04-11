<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'cart';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name_account',
        'phone',
        'email',
        'idGroup',
        'price',
        'rent_cost',
        'status',
        'status_type',
        'linkGroup',
        'timeCreate',
    ];
}
