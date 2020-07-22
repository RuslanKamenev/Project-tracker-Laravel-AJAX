<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tasks extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'status',
        'description',
        'deadline',
        'project_id'
    ];
}
