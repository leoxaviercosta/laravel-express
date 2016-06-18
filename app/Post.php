<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = array(
        "title",
        "content"
    );

    // método que retorna todos os comentarios de um post
    public function comments() {
        return $this->hasMany('App\Comment');
    }

    // retornas todas as tags para um post
    public function tags() {
        return $this->belongsToMany('App\Tag', 'posts_tags');
    }

    // método para atributo dinâmico, nesse caso as palavras 'get' e 'Attribute' são obrigatórias, o que fica entre é o nome do atributo dinâmico
    public function getTagListAttribute() {
        $tags = $this->tags()->lists('name')->all(); // retorna uma lista com os nomes das tags
        return implode(', ', $tags);
    }

}
