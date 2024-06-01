<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_name', 'type', 'role_id', 'training_id', 'research_number'];

    

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
