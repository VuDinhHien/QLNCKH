<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = ['office_id', 'office_name', 'address', 'phone', 'email', 'office_parent'];
}
