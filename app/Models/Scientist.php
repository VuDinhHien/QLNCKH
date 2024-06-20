<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scientist extends Model
{
    use HasFactory;

    protected $fillable = ['profile_id', 'profile_name', 'birthday', 'gender', 'birth_place', 'address', 'office_phone', 'house_phone', 'telephone', 'email', 'degree_id', 'investiture', 'scientific_title', 'research_major', 'research_title', 'research_position', 'office_id', 'address_office'];

    public function degree()
    {
        return $this->belongsTo(Degree::class, 'degree_id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'scientist_topic_role')
            ->withPivot('role_id')
            ->withTimestamps();
    }

    public function curriculums()
    {
        return $this->belongsToMany(Curriculum::class, 'scientist_curriculum_role')
            ->withPivot('role_id')
            ->withTimestamps();
    }

    public function magazines()
    {
        return $this->belongsToMany(Magazine::class, 'scientist_magazine_role')
            ->withPivot('role_id')
            ->withTimestamps();
    }
}
