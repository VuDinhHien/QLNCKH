<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lvcouncil extends Model
{
    use HasFactory;

    protected $fillable = ['lvcouncils_id', 'lvcouncils_name'];
}
