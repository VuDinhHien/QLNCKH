<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artopic extends Model
{
    use HasFactory;

    protected $fillable = ['artopic_id', 'artopic_name'];
}
