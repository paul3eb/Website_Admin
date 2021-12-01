<?php

namespace App\Models\Bac;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceed extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'title',
        'file',
    ];
}
