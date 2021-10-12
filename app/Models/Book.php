<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $dates = ['publication_date', 'created_at', 'updated_at', 'deleted_at'];
    protected $guarded = ['id'];
}
