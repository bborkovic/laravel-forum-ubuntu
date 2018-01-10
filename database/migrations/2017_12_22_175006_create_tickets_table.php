<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
            $table->string('description',400);
            $table->integer('user_id');
            // $table->timestamps();
            $table->timestamp('created_at')->default(DB::raw('SYSTIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('SYSTIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
