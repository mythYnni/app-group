<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;


class Admin extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'admin';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'slugUser',
        'fullName',
        'phone',
        'email',
        'linkFacebook',
    ];

    //Phương thức lấy thông tin theo id
    public function get_by_id($id){
        return DB::table('admin')->where('id', $id)->first();
    } 

    //Phương thức lấy danh sách
    public function getAll(){
        return DB::table('admin')->orderBy('id','ASC')->get();
    } 

    //Phương thức lấy danh sách không có quản trị
    public function get_orderBy_ASC(){
        return DB::table('admin')->orderBy('id','DESC')->get();
    } 

    // phương thức lấy nhân sự theo slug
    public function get_link_slug($slug){
        $obj = DB::table('admin')->where('slugUser', $slug)->first();
        return $obj;
    }

    // phương thức thêm mới
    public function create_admin($req){
        $creates = $this->Create([
            'slugUser' => $req -> slugUser,
            'fullName' => $req -> fullName,
            'linkFacebook' => $req -> linkFacebook,
            'phone' => $req -> phone,
            'email' => $req -> email,
        ]);
        return $creates;
    }

    // phương thức xóa nhân sự
    public function delete_admin($slug){
        $obj = DB::table('admin')->where('slugUser', $slug)->delete();
        return $obj;
    }

    // Phương thức cập nhật
    public function update_admin($req, $slug){
        $obj = DB::table('admin')->where('slugUser', $slug)->update([
            'fullName' => $req -> fullName,
            'linkFacebook' => $req -> linkFacebook,
            'phone' => $req -> phone,
            'email' => $req -> email,
        ]);
        return $obj;
    }
}
