<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class policy extends Model
{
    use HasFactory;
    protected $table = "policy";
    protected $guard = [];
    protected $fillable = [
        'title','image','url','show_on_homepage'
    ];
}
