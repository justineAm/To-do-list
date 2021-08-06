<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    
    public function task_list()
    {
        return $this->belongsTo(TaskList::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
