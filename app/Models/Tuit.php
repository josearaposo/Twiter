<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuit extends Model
{
    use HasFactory;

    public function comentarios()
    {
        return $this->morphMany(Comentario::class, 'comentable');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
