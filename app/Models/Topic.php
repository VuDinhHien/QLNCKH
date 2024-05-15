<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['topic_name', 'teacher_name', 'result', 'end_date', 'lvtopic_id'];

    // public function lvtopic() {
    //      return $this->hasOne(Lvtopic::class, 'id', 'lvtopic_id');
    // }

    public function lvtopic()
    {
        return $this->belongsTo(Lvtopic::class);
    }
}
