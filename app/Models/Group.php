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
        'nameGroup',
        'slugGroup',
        'linkGroup',
        'category',
        'account_group',
        'name_user_group',
        'image',
        'account_group_week',
        'account_group_blog',
        'blog_week',
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
    ];
}
