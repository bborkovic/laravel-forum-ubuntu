<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

   protected $fillable = [ 'user_id', 'reply_id', 'like_or_dislike' ];

   public function reply() {
      return $this->belongsTo('App\Reply');
   }

   public function user() {
      return $this->belongsTo('App\User');
   }

   public static function userAlreadyLiked($user_id, $reply_id) {
      if (static::where('user_id',$user_id)->where('reply_id',$reply_id)->get()->count() > 0) {
         return true;
      }
      return false;
   }
}
