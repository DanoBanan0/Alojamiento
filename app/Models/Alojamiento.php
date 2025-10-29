<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Alojamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen_url',
        'precio_por_noche',
    ];

    public function users()
    {
        // Un alojamiento "pertenece a muchos" usuarios
        return $this->belongsToMany(User::class);
    }
}
