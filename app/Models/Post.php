<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
 
    // necesario para guardar un registro luego de que este sea creado
    protected $fillable = [
    	'title', 
    	'slug', 
    	'body'
    ];


    public function user() // creando la relación, una publicación pertenece a un único usuario
    {
    	return $this->belongsTo(User::class); // pertenece a un usuario
    }
}