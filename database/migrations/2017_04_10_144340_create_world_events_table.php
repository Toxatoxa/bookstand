<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorldEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('world_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->text('description');
            $table->decimal('lat', 8, 5);
            $table->decimal('lng', 8, 5);
            $table->date('start_at')->nullable()->default(null);
            $table->date('finish_at')->nullable()->default(null);
            $table->timestamps();

            $table->index(['start_at', 'finish_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('world_events');
    }
}
