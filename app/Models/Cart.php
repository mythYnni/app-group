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

    //Phương thức lấy danh sách nhóm thuê nhiều
    public function get_all_count(){
        return $this->orderBy('timeCreate','DESC')->where('status', 0)->count();
    } 

    // phương thức xóa
    public function deleteCart($slug){
        $obj = DB::table('cart')->where('id', $slug)->delete();
        return $obj;
    }


    // phương thức lấy đơn hàng theo id
    public function get_by_id($slug){
        $obj = DB::table('cart')->where('id', $slug)->first();
        return $obj;
    }

    //Phương thức lấy danh sách
    public function get_orderBy_ASC(){
        return $this->orderBy('timeCreate','DESC')->get();
    } 

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
            'status' => $req -> status,
            'status_type' => $req -> status_type,
            'linkGroup' => $req -> linkGroup,
            'timeCreate' => $currentTime,
        ]);
        return $creates;
    }

     // Phương thức cập nhật note
     public function update_cart_note($req, $slug){
        $obj = DB::table('cart')->where('id', $slug)->update([
            'status' => $req -> status,
            'note' => $req -> note,
        ]);
        return $obj;
    }
}
