<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['topic_name', 'lvtopic_id', 'result', 'start_date', 'end_date'];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function scientists()
    {
        return $this->belongsToMany(Scientist::class, 'scientist_topic_role')
            ->withPivot('role_id')
            ->withTimestamps();
    }

    public function lvtopic()
    {
        return $this->belongsTo(Lvtopic::class, 'lvtopic_id');
    }

    public function files()
    {
        return $this->morphMany(File::class, 'related');
    }
}
