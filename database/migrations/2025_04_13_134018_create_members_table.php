<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            // Étape 1 : Infos personnelles
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other', 'prefer_not_to_say']);
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('city', 100);
            $table->string('province', 100);
            $table->string('current_status');
            $table->string('education_level');
            $table->string('field_of_study', 100);
            $table->json('interests');
            $table->text('motivation');
            $table->boolean('previously_participated');
            $table->json('hear_about_us');
            $table->boolean('receive_newsletter');

            // Étape 2 : Téléversement de fichiers
            $table->string('cv_path');
            $table->string('cin_path');
            $table->string('motivation_letter_path')->nullable();

            // Consentements
            $table->boolean('data_consent');
            $table->boolean('values_consent');

            // Paiement
            $table->enum('payment_mode', ['online', 'bank_transfer'])->nullable();
            $table->string('payment_proof_path')->nullable();
            $table->string('payment_reference')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->boolean('has_paid')->default(false);
            $table->boolean('fmdd_consent')->default(false);
            $table->enum('payment_status', ['pending', 'approved', 'rejected'])->nullable();

            // Statut global
            $table->enum('status', ['pending_payment', 'payment_received', 'completed'])->default('pending_payment');

            $table->timestamp('registration_date')->nullable();
            $table->timestamps();

            // Ajout de la fonctionnalité SoftDeletes
            $table->softDeletes(); // Ajoute la colonne deleted_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
}
