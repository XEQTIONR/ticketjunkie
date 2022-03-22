<?php

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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('confirmation_number', 32);
            $table->string('status')->default('created');
            $table->string('type');
            $table->string('section')->nullable();
            $table->string('seat_number')->nullable();
            $table->integer('current_price')->default(0);
            $table->foreignId('show_id');
            $table->foreignId('show_slot_id');
            $table->foreignId('belongs_to_id');
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('show_id')->references('id')->on('shows')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('show_slot_id')->references('id')->on('show_slots')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('belongs_to_id')->references('id')->on('users')
                ->onDelete('restrict')->onUpdate('cascade');
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
};
