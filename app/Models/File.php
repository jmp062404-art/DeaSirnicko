<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //Allow Mass Assignment
    protected $fillable = ["name", "email"];
}