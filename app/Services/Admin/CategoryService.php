<?php


namespace App\Services\Admin;


use App\Models\Category;

class CategoryService
{
    public static function getList() {
        return Category::query()->where(['status' => Category::STATUS_ENABLE])->orderBy('ordinal')->get();
    }
}
