<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;
Use \TCG\Voyager\Traits\Translatable;

class Post extends Model
{
    use Commentable,Translatable;

    protected $table = 'posts';

    public function author()
    {
      return $this->belongsTo('App\User','user_id');
    }
}
