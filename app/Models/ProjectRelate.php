<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRelate extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_relates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'category_id'
    ];
}
