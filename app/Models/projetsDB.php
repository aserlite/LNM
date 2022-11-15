<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projetsDB extends Model
{
    use HasFactory;
    protected $table="projets";
    public $timestamps =false;
}
