<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'banner';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'image',
        'link',
        'status_type',
        'status',
        'timeCreate',
    ];

    //Phương thức lấy danh sách
    public function get_popup_orderBy_ASC(){
        return $this->orderBy('timeCreate','DESC')->where('status_type', 1)->get();
    } 

    //Phương thức lấy danh sách
    public function get_orderBy_ASC(){
        return $this->orderBy('timeCreate','DESC')->where('status_type', 0)->get();
    } 

    // phương thức thêm mới
    public function create_banner($req){
        $currentTime = now();
        $creates = $this->Create([
            'name' => $req -> name,
            'slug' => $req -> slug,
            'image' => $req -> image,
            'status_type' => $req -> status_type,
            'link' => $req -> link,
            'status' => $req -> status,
            'timeCreate' => $currentTime,
        ]);
        return $creates;
    }

    // phương thức lấy danh mục theo slug
    public function get_link_slug($slug){
        $obj = DB::table('banner')->where('slug', $slug)->first();
        return $obj;
    }

    // phương thức xóa danh mục
    public function deleteBanner($slug){
        $obj = DB::table('banner')->where('slug', $slug)->delete();
        return $obj;
    }

    // Phương thức cập nhật
    public function update_banner($req, $slug){
        $obj = DB::table('banner')->where('slug', $slug)->update([
            'name' => $req -> name,
            'slug' => $req -> slug,
            'image' => $req -> image,
            'link' => $req -> link,
            'status' => $req -> status,
        ]);
        return $obj;
    }
}
