<?php

use App\Models\Church;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preachings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('predicator_name');
            $table->string('cover_image_url')->nullable();
            $table->string('audio_file_url')->nullable();
            $table->enum('status',['ONLINE','OFFLINE'])->default('OFFLINE');
            $table->foreignIdFor(Church::class)->constrained();
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
        Schema::dropIfExists('preachings');
    }
};
