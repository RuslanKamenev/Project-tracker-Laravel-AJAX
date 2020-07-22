<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];


}
