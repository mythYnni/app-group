<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'blog';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'image',
        'detail',
        'status',
        'timeCreate',
    ];

    //Phương thức lấy danh sách
    public function get_orderBy_ASC(){
        return $this->orderBy('timeCreate','DESC')->get();
    } 

    // phương thức thêm mới
    public function create_blog($req){
        $currentTime = now();
        $creates = $this->Create([
            'name' => $req -> name,
            'slug' => $req -> slug,
            'image' => $req -> image,
            'detail' => $req -> detail,
            'status' => $req -> status,
            'timeCreate' => $currentTime,
        ]);
        return $creates;
    }

    // phương thức lấy danh mục theo slug
    public function get_link_slug($slug){
        $obj = DB::table('blog')->where('slug', $slug)->first();
        return $obj;
    }

    // phương thức xóa danh mục
    public function deleteBlog($slug){
        $obj = DB::table('blog')->where('slug', $slug)->delete();
        return $obj;
    }

    // Phương thức cập nhật
    public function update_blog($req, $slug){
        $obj = DB::table('blog')->where('slug', $slug)->update([
            'name' => $req -> name,
            'slug' => $req -> slug,
            'image' => $req -> image,
            'detail' => $req -> detail,
            'status' => $req -> status,
        ]);
        return $obj;
    }
}
