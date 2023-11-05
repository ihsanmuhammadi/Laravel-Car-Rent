<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Nama: Ihsan Muhammad Iqbal
// NIM: 6706220123
class Transaction extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'userId',
        'vehicleId',
        'startDate',
        'endDate',
        'price',
        'status'
    ];
}
