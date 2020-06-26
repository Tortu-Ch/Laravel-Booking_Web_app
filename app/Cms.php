<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cms extends Model
{
    protected $table = 'cms';
    protected $fillable = ['title', 'description', 'slug','active', 'meta_title','meta_description','created_at', 'updated_at'];
    use SoftDeletes; 
}
