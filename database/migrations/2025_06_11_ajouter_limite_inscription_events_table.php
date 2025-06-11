<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            if (!Schema::hasColumn('events', 'date_limite_inscription')) {
                $table->date('date_limite_inscription')->nullable();
            }
            if (!Schema::hasColumn('events', 'heure_limite_inscription')) {
                $table->time('heure_limite_inscription')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'date_limite_inscription')) {
                $table->dropColumn('date_limite_inscription');
            }
            if (Schema::hasColumn('events', 'heure_limite_inscription')) {
                $table->dropColumn('heure_limite_inscription');
            }
        });
    }
};
