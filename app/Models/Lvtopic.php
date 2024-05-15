<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lvtopic extends Model
{
    use HasFactory;

    protected $fillable = ['lvtopic_name', 'category'];

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
