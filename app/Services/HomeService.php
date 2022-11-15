<?php


namespace App\Services;


use App\Models\Banner;

class HomeService
{
    public static function getHomeBanners() {
        return Banner::query()->where('status', Banner::STATUS_ENABLE)->orderBy('ordinal')->limit(1)->get();
    }

    public static function getHomeProducts() {
        return Banner::query()->where('status', Banner::STATUS_ENABLE)->orderBy('ordinal')->get();
    }
}
