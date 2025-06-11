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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('titre_projet', 255);
            $table->text('description_projet');
            $table->string('theme', 255)->nullable();
            $table->timestamp('date_projet')->nullable()->default(null);
            $table->string('statut_projet', 100)->nullable();
            $table->string('image', 255)->nullable();
            $table->text('description_detaillee');
            $table->string('organisateur', 255)->nullable();
            $table->string('localisation', 255);
            $table->string('duree', 100);
            $table->string('image_partenaire', 255)->nullable();
            $table->text('objectif_projet')->nullable();
            $table->text('grande_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
