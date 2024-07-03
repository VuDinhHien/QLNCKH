<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class File extends Model
{
    use HasFactory;

    protected $fillable = ['file_path', 'file_type', 'related_id', 'related_type','original_name'];

    public function related()
    {
        return $this->morphTo();
    }
}