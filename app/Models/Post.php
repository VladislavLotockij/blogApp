<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //TODO: Add use SoftDelete;

    protected $table = 'posts';
    protected $guarded = false;
}
