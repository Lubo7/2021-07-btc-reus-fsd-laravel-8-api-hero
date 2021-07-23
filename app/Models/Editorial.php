<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'fundador',
        'fecha_fundacion',
    ];

    public function heroes()
    {
        return $this->hasMany(Heroe::class);
    }
}
