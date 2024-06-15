<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculums'; // Chỉ định tên bảng

    protected $fillable = ['name', 'year', 'publisher', 'book_id', 'training_id'];

   

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    
    public function scientists()
    {
        return $this->belongsToMany(Scientist::class, 'scientist_curriculum_role')
                    ->withPivot('role_id')
                    ->withTimestamps();
    }
}
