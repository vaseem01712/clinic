<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('medical_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('appointment_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('test_type')->nullable();
            $table->text('description')->nullable();
            $table->date('report_date');
            $table->string('file_path');
            $table->string('file_name');
            $table->string('mime_type', 150);
            $table->unsignedBigInteger('file_size')->default(0);
            $table->enum('status', ['draft','sent'])->default('sent');
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
            $table->index(['patient_id','doctor_id','report_date']);
        });
    }
    public function down(): void { Schema::dropIfExists('medical_reports'); }
};
