<?php

namespace App\Models\Planning;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Private_plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_school',
        'address',
        'email',
        'school_head',
        'file',
    ];
}
