<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    
    public static function saveBackup($types = ['created', 'updated', 'deleted', 'retrieved']) {

        if(auth()->check()) {

            foreach($types as $type) {

                forward_static_call([__CLASS__, $type], function($article) use($type){

                    $user = auth()->user();
                    $backup = new Backup();
                    $backup->article = get_class($article);
                    $backup->article_id = $article->id;
                    $backup->user_id = $user->id;
                    $backup->content = $article->content;
                    $backup->save();

                });

            }

        }

    }


}
