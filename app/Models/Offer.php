<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['proposer', 'year', 'offer_name', 'propose_id', 'suggestion_id', 'note'];

    

    public function propose()
    {
        return $this->belongsTo(Propose::class);
    }

    public function suggestion()
    {
        return $this->belongsTo(Suggestion::class);
    }
}
