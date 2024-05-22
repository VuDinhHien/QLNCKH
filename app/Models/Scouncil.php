<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scouncil extends Model
{
    use HasFactory;

    protected $fillable = ['decision_number', 'date', 'lvcouncil_id', 'tpcouncil_id', 'scouncil_name', 'year'];

    

    public function lvcouncil()
    {
        return $this->belongsTo(Lvcouncil::class);
    }

    public function tpcouncil()
    {
        return $this->belongsTo(Tpcouncil::class);
    }
}
