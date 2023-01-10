<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'name',
        'region',
        'ket',
        'purposes',
        'date',
        'return_date',
        'teacher',
        'status',
        'done_time',
        'user_id',
    ];
}
