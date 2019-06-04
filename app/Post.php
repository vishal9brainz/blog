<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='post';

   public function users()
   {
   	return $this->belongsTo(User::class);
   }
}
