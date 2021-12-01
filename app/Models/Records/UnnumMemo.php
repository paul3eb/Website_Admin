<?php

namespace App\Models\Records;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnnumMemo extends Model
{
    use HasFactory;
    protected $fillable = ['date','title','file'];
}
