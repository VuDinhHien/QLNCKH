<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsearch extends Model
{
    use HasFactory;

    protected $fillable = ['arsearch_id', 'arsearch_name'];
}
