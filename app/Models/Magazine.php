<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    protected $fillable = ['magazine_name', 'year', 'journal', 'paper_id'];


    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }
}
