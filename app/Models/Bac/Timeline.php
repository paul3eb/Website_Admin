<?php

namespace App\Models\Bac;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'title',
        'file',
    ];
}
