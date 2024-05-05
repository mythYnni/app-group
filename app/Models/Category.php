<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'categories';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'status',
        'timeCreate',
    ];

    //Phương thức lấy danh sách có status bằng 0 
    public function get_orderBy_Where_status_ASC(){
        return $this->orderBy('timeCreate','DESC')->where('status', 0)->get();
    } 


    //Phương thức lấy danh sách
    public function get_orderBy_ASC(){
        return $this->orderBy('timeCreate','DESC')->get();
    } 

    // phương thức thêm mới
    public function create_category($req){
        $currentTime = now();
        $creates = $this->Create([
            'name' => $req -> name,
            'slug' => $req -> slug,
            'status' => $req -> status,
            'timeCreate' => $currentTime,
        ]);
        return $creates;
    }

    // phương thức lấy danh mục theo slug
    public function get_link_slug($slug){
        $obj = DB::table('categories')->where('slug', $slug)->first();
        return $obj;
    }

    // phương thức xóa danh mục
    public function deleteCategory($slug){
        $obj = DB::table('categories')->where('slug', $slug)->delete();
        return $obj;
    }

    // Phương thức cập nhật
    public function update_category($req, $slug){
        $obj = DB::table('categories')->where('slug', $slug)->update([
            'name' => $req -> name,
            'slug' => $req -> slug,
            'status' => $req -> status,
        ]);
        return $obj;
    }

    // Phương Thức Liên kết khóa ngoại
    public function Group(){
        return $this->hasMany('App\Models\Group', 'idCategory','id');
    }
}
