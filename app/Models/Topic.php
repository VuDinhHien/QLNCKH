<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['topic_name', 'profile_id', 'lvtopic_id','role_id', 'result', 'start_date', 'end_date',];

    // public function lvtopic() {
    //      return $this->hasOne(Lvtopic::class, 'id', 'lvtopic_id');
    // }

    public function lvtopic()
    {
        return $this->belongsTo(Lvtopic::class);
    }

    
    public function scientist()
    {
        return $this->belongsTo(Scientist::class, 'profile_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
