<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = ['conference_name', 'seminar_id', 'office', 'unit', 'money', 'status_name', 'date'];

    

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }
}
