<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // 🔹 Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad',
        'imagen',
        'categoria_id', // Campo de relación con la tabla categorias
    ];

    // 🔹 Relación: un producto pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
