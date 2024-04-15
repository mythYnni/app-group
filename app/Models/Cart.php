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
        'nameGroup',
        'price',
        'rent_cost',
        'status',
        'status_type',
        'linkGroup',
        'timeCreate',
        'note',
    ];

    // phương thức thêm mới
    public function create_cart($req){
        $currentTime = now();
        $creates = $this->Create([
            'name_account' => $req -> name_account,
            'phone' => $req -> phone,
            'email' => $req -> email,
            'idGroup' => $req -> idGroup,
            'nameGroup' => $req -> nameGroup,
            'price' => $req -> price,
            'rent_cost' => $req -> rent_cost,
            'status_type' => $req -> status_type,
            'linkGroup' => $req -> linkGroup,
            'timeCreate' => $currentTime,
        ]);
        return $creates;
    }

}
