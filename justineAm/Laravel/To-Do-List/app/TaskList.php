<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskList extends Model
{
    protected $table ='lists';

    public function list_items()
    {
        return $this->hasMany(ListItem::class, 'list_id');
    }

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function getCountDoneAttribute()
    {
        return $this->list_items()->where('is_done',1)->count();
    }
}
