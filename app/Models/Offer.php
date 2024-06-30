<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [ 'year', 'offer_name', 'propose_id', 'note', 
    'status',];

    

    public function propose()
    {
        return $this->belongsTo(Propose::class);
    }

    public function scientists()
    {
        return $this->belongsToMany(Scientist::class, 'scientist_offer_role')
                    ->withPivot('role_id')
                    ->withTimestamps();
    }
}
