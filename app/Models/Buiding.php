<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Buiding extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'buiding';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'idCart',
        'code',
        'code_group',
        'name_account',
        'phone',
        'linkFacebook',
        'email',
        'nameGroup',
        'idGroup',
        'price',
        'rent_cost',
        'totail_price',
        'status_type',
        'linkGroup',
        'time',
        'time_out',
        'timeCreate',
        'date',
        'note',
    ];

    // phương thức xóa buiding
    public function delete_Buiding_model($slug){
        $obj = DB::table('buiding')->where('code', $slug)->delete();
        return $obj;
    }

    // phương thức lấy buiding theo slug
    public function get_link_code_delete($slug){
        $obj = DB::table('buiding')->where('code', $slug)->first();
        return $obj;
    }

    // phương thức lấy buiding theo slug
    public function get_link_code($slug){
        $obj = DB::table('buiding')->where('idCart', $slug)->first();
        return $obj;
    }

    //Phương thức lấy danh sách
    public function get_orderBy_asc_rent(){
        return $this->where('status_type', 0)->orderBy('timeCreate','DESC')->get();
    }

    //Phương thức lấy danh sách
    public function get_orderBy_asc_buy(){
        return $this->where('status_type', 1)->orderBy('timeCreate','DESC')->get();
    }

    // phương thức thêm mới
    public function create_buiding_thue($req){
        $currentTime = now();
        $creates = $this->Create([
            'code' => $req->code, // Mã phiếu
            'idCart'=> $req->idCart,
            'code_group'=> $req->code_group,
            'name_account'=> $req->name_account,
            'phone'=> $req->phone,
            'linkFacebook'=> $req->linkFacebook,
            'email'=> $req->email,
            'nameGroup'=> $req->nameGroup,
            'idGroup'=> $req->idGroup,
            'rent_cost'=> $req->rent_cost,
            'totail_price'=> $req->totail_price,
            'status_type'=> $req->status_type,
            'linkGroup'=> $req->code,
            'time'=> $req->time,
            'time_out'=> $req->time_out,
            'note'=> $req->note,
            'date'=> $req->date,
            'timeCreate' => $currentTime,
        ]);
        return $creates;
    }

    // phương thức thêm mới buiding mua
    public function create_buiding_mua($req){
        $currentTime = now();
        $creates = $this->Create([
            'code' => $req->code, // Mã phiếu
            'idCart'=> $req->idCart,
            'code_group'=> $req->code_group,
            'name_account'=> $req->name_account,
            'phone'=> $req->phone,
            'linkFacebook'=> $req->linkFacebook,
            'email'=> $req->email,
            'nameGroup'=> $req->nameGroup,
            'idGroup'=> $req->idGroup,
            'price'=> $req->price,
            'totail_price'=> $req->totail_price,
            'status_type'=> $req->status_type,
            'linkGroup'=> $req->code,
            'note'=> $req->note,
            'timeCreate' => $currentTime,
        ]);
        return $creates;
    }
}
