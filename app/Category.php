<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

   protected $fillable = [ 'name', 'level' ];

   public function threads() {
      return $this->hasMany('App\Thread');
   }

   public static function hasCategory($cat) {
      if ( static::where('name',$cat)->get()->count() == 1 ) {
         return true;
      }
      return false;
   }

}
