<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Project extends Model
{
    use SoftDeletes;

    const STATUS_DISABLE = 0;
    const STATUS_ENABLE = 1;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'thumbnail',
        'banner',
        'meta_data',
        'content',
        'status',
    ];

    /**
     * @param $id
     * @param string $pluck
     * @return Collection
     */
    public static function getCategoriesByID($id, string $pluck = '') {
        $query = ProjectRelate::query()->where(['project_id' => $id]);
        if (empty($pluck)) {
           return $query->get();
        } else {
           return $query->pluck($pluck);
        }
    }
}
