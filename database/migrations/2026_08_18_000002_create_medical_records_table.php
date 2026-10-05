<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('appointment_id')->nullable()->constrained()->nullOnDelete();
            $table->text('diagnosis')->nullable();
            $table->text('symptoms')->nullable();
            $table->longText('clinical_notes')->nullable();
            $table->longText('prescription')->nullable();
            $table->longText('treatment_plan')->nullable();
            $table->longText('follow_up_instructions')->nullable();
            $table->text('test_recommendations')->nullable();
            $table->longText('medical_history')->nullable();
            $table->longText('visit_notes')->nullable();
            $table->longText('doctor_notes')->nullable();
            $table->longText('patient_visible_notes')->nullable();
            $table->timestamps();
            $table->index(['patient_id','doctor_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('medical_records'); }
};
