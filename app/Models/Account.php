<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;


class Account extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'slugUser',
        'fullName',
        'sex',
        'birthday',
        'phone',
        'email',
        'decentralization',
        'password',
        'status',
        'timeCreate',
    ];

    //Phương thức lấy danh sách không có quản trị
    public function get_orderBy_ASC(){
        return DB::table('users')->where('email', '!=', 'admin@group.com.vn')->where('email', '!=', 'admin@gmail.com')->orderBy('timeCreate','DESC')->get();
    } 

    // phương thức lấy nhân sự theo slug
    public function get_link_slug($slug){
        $obj = DB::table('users')->where('slugUser', $slug)->first();
        return $obj;
    }

    // phương thức thêm mới
    public function create_account($req){
        $currentTime = now();
        $creates = $this->Create([
            'slugUser' => $req -> slugUser,
            'fullName' => $req -> fullName,
            'sex' => $req -> sex,
            'birthday' => $req -> birthday,
            'phone' => $req -> phone,
            'email' => $req -> email,
            'decentralization' => $req -> decentralization,
            'password' => $req -> password,
            'status' => $req -> status,
            'timeCreate' => $currentTime,
        ]);
        return $creates;
    }

    // phương thức xóa nhân sự
    public function delete_account($slug){
        $obj = DB::table('users')->where('slugUser', $slug)->delete();
        return $obj;
    }

    // Phương thức cập nhật
    public function update_account($req, $slug){
        $obj = DB::table('users')->where('slugUser', $slug)->update([
            'fullName' => $req -> fullName,
            'sex' => $req -> sex,
            'birthday' => $req -> birthday,
            'phone' => $req -> phone,
            'decentralization' => $req -> decentralization,
        ]);
        return $obj;
    }

    // Phương thức cập nhật mật khẩu
    public function update_password_account($req, $slug){
        $obj = DB::table('users')->where('slugUser', $slug)->update([
            'password' => $req -> password,
        ]);
        return $obj;
    }

    // Phương thức cập nhật hồ sơ
    public function update_profile($req, $slug){
        $obj = DB::table('users')->where('slugUser', $slug)->update([
            'fullName' => $req -> fullName,
            'sex' => $req -> sex,
            'birthday' => $req -> birthday,
            'phone' => $req -> phone,
        ]);
        return $obj;
    }
}
