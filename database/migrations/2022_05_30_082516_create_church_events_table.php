<?php

use App\Models\Church;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('church_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('cover_event_url')->nullable();
            $table->dateTime('started_at_date')->nullable();
            $table->dateTime('finished_at_date')->nullable();
            $table->dateTime('started_at_time')->nullable();
            $table->dateTime('finished_at_time')->nullable();
            $table->string('adress')->nullable();
            $table->foreignIdFor(Church::class)->constrained();
            $table->enum('status',['ONLINE','OFFLINE'])->default('OFFLINE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('church_events');
    }
};
