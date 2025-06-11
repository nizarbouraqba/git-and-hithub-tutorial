<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('day')->nullable()->after('is_a_venir');
            $table->string('month')->nullable()->after('day');
            $table->string('heure_event')->nullable()->after('month');
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['day', 'month', 'heure_event']);
        });
    }
};
