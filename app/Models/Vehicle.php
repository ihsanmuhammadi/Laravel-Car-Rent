<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Nama : Ihsan Muhammad Iqbal
// NIM : 6706220123
class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'license',
        'dailyPrice',
        'status'
    ];
}
