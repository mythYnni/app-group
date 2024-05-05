<?php

namespace App\Helper;

class HistoryGroup{
    public $items = [];

    public function __construct(){
        $this->items = session('historyGroup') ? session('historyGroup') : [];
    }
    // lấy danh sách
    public function list_historyGroup(){
        return $this->items;
    }

    // Thêm mới
    public function add_historyGroup($course){
        $item = [
            'nameGroup' => $course -> nameGroup,
            'code' => $course -> code,
            'slugGroup' => $course -> slugGroup,
            'linkGroup' => $course -> linkGroup,
            'category' => $course -> category,
            'account_group' => $course -> account_group,
            'image' => $course -> image,
            'account_group_week' => $course -> account_group_week,
            'account_group_blog' => $course -> account_group_blog,
            'province' => $course -> province,
            'district' => $course -> district,
            'type_sale' => $course -> type_sales,
            'wards' => $course -> wards,
            'idCategory' => $course -> idCategory,
            'type' => $course -> type,
            'price' => $course -> price,
            'rent_cost' => $course -> rent_cost,
            'status' => $course -> status,
            'status_color' => $course -> status_color,
            'detail_group' => $course -> detail_group,
            'user_create' => $course -> user_create,
            'user_email_create' => $course -> user_email_create,
        ];

        $this->items[$course->id] = $item;

        session(['historyGroup' => $this->items]);
    }
}