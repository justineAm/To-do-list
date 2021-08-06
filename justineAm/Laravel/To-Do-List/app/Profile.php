<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/ZOmBc1YA5j4E7qUjMufX0gSp6A1184pIcsdEaGt3.jpeg';
        return '/storage/' .$imagePath;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    
}
