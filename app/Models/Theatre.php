<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    use HasFactory;

    protected $fillable = [
        'theatre_id',
        'theatre_name',
        'movie',
        'tanggal',
        'play_time'
    ];
}
