<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;

class Fish extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
