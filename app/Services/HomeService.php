<?php


namespace App\Services;


use App\Models\Banner;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectRelate;

class HomeService
{
    public static function getHomeBanners() {
        return Banner::query()->where('status', Banner::STATUS_ENABLE)->orderBy('ordinal')->limit(1)->get();
    }

    public static function getHomeCategories() {
        $categories = Category::query()
            ->where('status', Banner::STATUS_ENABLE)
            ->orderBy('ordinal')
            ->get();
        if ($categories->isNotEmpty()) {
            $categories->each(function (&$item) {
                $item->count_project = ProjectRelate::query()
                    ->join('projects', 'project_id', '=', 'projects.id')
                    ->where(['category_id' => $item->id, 'projects.status' => Project::STATUS_ENABLE])
                    ->count();
            });
        }
        return $categories;
    }

    public static function getHomeProjects() {
        $projects = Project::query()
            ->with('relates')
            ->where(['status' => Project::STATUS_ENABLE])
            ->orderBy('ordinal', 'ASC')
            ->get();
        if ($projects->isNotEmpty()) {
            $projects->each(function (&$item) {
                $relates = $item->getCategoriesByID($item->id, 'category_id');
                if ($relates->isNotEmpty()) {
                    $categories = Category::query()->whereIn('id', $relates)->get();
                }
                $item->categories = $categories;
            });
        }
        return $projects;
    }
}
