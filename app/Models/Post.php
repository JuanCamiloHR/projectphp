<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user() // creando la relación, una publicación pertenece a un único usuario
    {
    	return $this->belongsTo(User::class); // pertenece a un usuario
    }
}