<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
       Schema::table('categories', function($table) {
           $table->string('level');
       });
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
   {
       Schema::table('categories', function($table) {
           $table->dropColumn('level');
       });
   }
}