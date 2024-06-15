<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientistCurriculumRole extends Model
{
    

    use HasFactory;

    protected $table = 'scientist_curriculum_role';

    protected $fillable = ['scientist_id', 'curriculum_id', 'role_id'];
}
