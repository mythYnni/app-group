<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Group extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'group';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'code',
        'nameGroup',
        'slugGroup',
        'linkGroup',
        'category',
        'account_group',
        'name_user_group',
        'image',
        'account_group_week',
        'account_group_blog',
        'province',
        'district',
        'wards',
        'idCategory',
        'type',
        'price',
        'rent_cost',
        'status',
        'status_color',
        'timeCreate',
        'detail_group',
        'user_create',
        'user_email_create',
        'rentals'
    ];

     //Phương thức lấy 12 danh sách nhóm thuê nhiều
     public function get_all_rent_paginate_12(){
        return Group::with('objCategory')->where('type_sale', 1)->orderBy('timeCreate','DESC')->paginate(12);
    } 

    //Phương thức lấy 12 danh sách nhóm tương tác tốt
    public function get_all_interact_paginate_12(){
        return Group::with('objCategory')->where('type_sale', 2)->orderBy('timeCreate','DESC')->paginate(12);
    } 


    // phương thức lấy hội nhóm theo slug
    public function get_link_slug($slug){
        $obj = DB::table('group')->where('slugGroup', $slug)->first();
        return $obj;
    }

    //Phương thức lấy danh sách nhóm thuê nhiều
    public function get_all_rent(){
        return Group::with('objCategory')->where('type_sale', 1)->orderBy('timeCreate','DESC')->get();
    } 

    //Phương thức lấy danh sách nhóm tương tác tốt
    public function get_all_interact(){
        return Group::with('objCategory')->where('type_sale', 2)->orderBy('timeCreate','DESC')->get();
    } 


    //Phương thức lấy danh sách nhóm mặc định
    public function get_all_default(){
        return Group::with('objCategory')->where('type_sale', 0)->orderBy('timeCreate','DESC')->get();
    } 

    // phương thức thêm mới
    public function create_group($req){
        $currentTime = now();
        $creates = $this->Create([
            'nameGroup' => $req -> nameGroup,
            'code' => $req -> code,
            'slugGroup' => $req -> slugGroup,
            'linkGroup' => $req -> linkGroup,
            'category' => $req -> category,
            'account_group' => $req -> account_group,
            'name_user_group' => json_encode($req -> name_user_group),
            'image' => $req -> image,
            'account_group_week' => $req -> account_group_week,
            'account_group_blog' => $req -> account_group_blog,
            'province' => $req -> province,
            'district' => $req -> district,
            'type_sale' => $req -> type_sale,
            'wards' => $req -> wards,
            'idCategory' => $req -> idCategory,
            'type' => $req -> type,
            'price' => $req -> price,
            'rent_cost' => $req -> rent_cost,
            'status' => $req -> status,
            'status_color' => $req -> status_color,
            'detail_group' => $req -> detail_group,
            'user_create' => $req -> user_create,
            'user_email_create' => $req -> user_email_create,
            'timeCreate' => $currentTime,
        ]);
        return $creates;
    }

    // phương thức xóa hội nhóm
    public function delete_group($slug){
        $obj = DB::table('group')->where('slugGroup', $slug)->delete();
        return $obj;
    }

    public function objCategory()
    {
        return $this->belongsTo(Category::class, 'idCategory');
    }

    // Phương thức cập nhật
    public function update_group($req, $slug){
        $obj = DB::table('group')->where('slugGroup', $slug)->update([
            'nameGroup' => $req -> nameGroup,
            'code' => $req -> code,
            'slugGroup' => $req -> slugGroup,
            'linkGroup' => $req -> linkGroup,
            'category' => $req -> category,
            'account_group' => $req -> account_group,
            'name_user_group' => json_encode($req -> name_user_group),
            'image' => $req -> image,
            'account_group_week' => $req -> account_group_week,
            'account_group_blog' => $req -> account_group_blog,
            'province' => $req -> province,
            'type_sale' => $req -> type_sale,
            'district' => $req -> district,
            'wards' => $req -> wards,
            'idCategory' => $req -> idCategory,
            'type' => $req -> type,
            'price' => $req -> price,
            'rent_cost' => $req -> rent_cost,
            'status' => $req -> status,
            'status_color' => $req -> status_color,
            'detail_group' => $req -> detail_group,
        ]);
        return $obj;
    }
}
