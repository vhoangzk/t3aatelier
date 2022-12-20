<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Feedback
 * @package App\Models
 *
 * @property string name
 * @property string email
 * @property string content
 * @property boolean read
 */

class Feedback extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feedback';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'content',
        'read',
    ];
}
