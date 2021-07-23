<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heroe extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'identity',
        'power',
        'editorial_id',
    ];

    public function editorials()
    {
        return $this->belongsTo(Editorial::class);
    }
}
