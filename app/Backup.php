<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
