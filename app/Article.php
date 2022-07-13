<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','content','thumbnail','category'] ;
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public static function getCaption($target_str)
    {
        preg_match_all('/<(h[23])>((?<=<h[23]>).*?(?=<\/h[23]>))<\/h[23]>/', $target_str, $array_result, PREG_SET_ORDER);
        return $array_result;
    }
    
    public static function getContentHtml($target_str)
    {
        $array_result = self::getCaption($target_str);
        $result_str = $target_str;
        
        foreach($array_result as $tag){
            $replace = '<'.$tag[1].' id="'.$tag[2].'">'.$tag[2].'</'.$tag[1].'>';
            $result_str = str_replace($tag[0], $replace, $result_str);
        }
        return $result_str;
    }

}
