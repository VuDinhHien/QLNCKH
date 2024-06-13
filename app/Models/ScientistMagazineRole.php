<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientistMagazineRole extends Model
{
   

    use HasFactory;

    protected $table = 'scientist_magazine_role';

    protected $fillable = ['scientist_id', 'magazine_id', 'role_id'];
}
