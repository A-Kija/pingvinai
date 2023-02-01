<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    // public $timestamps = false; jei kuriame su new ir nera timestamps
    protected $casts = [
        'start' => 'date',
        'end' => 'date',
    ];
}
