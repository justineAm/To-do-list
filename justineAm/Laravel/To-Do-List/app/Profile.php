<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = []; 

    public function profileImage()
    {

      $imagePath = ($this->image)? $this->image : '/profile/https://images.theconversation.com/files/297484/original/file-20191017-98648-1x0b4mh.png?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=1200.0&fit=crop' ;
      return '/storage/'.$imagePath;

    }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
