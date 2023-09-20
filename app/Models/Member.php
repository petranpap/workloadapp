<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    // Fillable fields to allow mass assignment
    protected $fillable = ['name', 'email', 'supervisor','data'];
}
