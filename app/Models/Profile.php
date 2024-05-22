<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['profile_id', 'profile_name', 'birthday', 'gender',	'birth_place',	'address',	'office_phone',	'house_phone',	'telephone',	'email',	'degree_id',	'investiture',	'scientific_title', 	'research_major', 'research_title',	'research_position'	,'office_id',	'address_office'];

    public function degree(){
        return $this->hasOne(Degree::class, 'id','degree_id');
    }

    public function office(){
        return $this->hasOne(Office::class, 'id','office_id');
    }
}
