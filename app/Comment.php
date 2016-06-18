<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = array(
        "post_id",
        "comment",
        "name",
        "email"
    );

    // método que retorna o post de um comentário
    public function post() {
        return $this->belongsTo('App\Post');
    }

}
