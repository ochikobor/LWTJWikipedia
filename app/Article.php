<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\BackupTrait; 

class Article extends Model
{
    protected $fillable = ['title','content','thumbnail','category'] ;
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
