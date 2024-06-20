<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientistTopicRole extends Model
{
    use HasFactory;

    protected $table = 'scientist_topic_role';

    protected $fillable = ['scientist_id', 'topic_id', 'role_id'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
