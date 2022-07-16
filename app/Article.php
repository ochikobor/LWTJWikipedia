<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Backup;

class Article extends Model
{
    protected $fillable = ['title','content','thumbnail','category'] ;
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
   
    public static function backups() {
        return $this->hasMany(Backup::class);
    }
}
