<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];
    // Relacion de que un usuario puede tener muchos post
    public function user(){
        return $this->belongsTo(User::class)->select(['name','username']);
    }
    // Relacion que un post puede tener muchos comentarios
    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }
    //Relacion de que un post puede tener muchos likes 
    public function likes(){
        return $this->hasMany(Like::class);
    }
    // Revisar si ya el usuario le dio like a la publicacion
    public function checkLike(User $user){
        return $this->likes->contains('user_id', $user->id);
    }

    
}
