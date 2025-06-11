<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('titre',255);
            $table->text('description');
            $table->boolean('is_a_venir')->default(false);
            $table->date("date_limite_d'inscription");
            $table->time("heure_limite_d'inscription");
            $table->date('date');
            $table->time('heure');
            $table->string('ville', 100);
            $table->string('image', 255)->nullable();
            $table->decimal('prix', 10, 2)->nullable();
            $table->string('categorie', 100)->nullable();
            $table->text('description_detaillee')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
