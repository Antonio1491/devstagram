<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'description',
        'imagen',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    //REVISAR SI UN USUARIO YA LE DIO LIKE A UN POST
    public function checklike(User $user)
    {
        //contains: se situa en tabla likes y revisa la columna user_id y revisar si existe ese usuario->id
        return $this->likes->contains('user_id', $user->id);
    }
}
