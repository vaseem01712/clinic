<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('specialty_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedTinyInteger('experience_years')->default(0);
            $table->string('education')->nullable();
            $table->text('biography')->nullable();
            $table->json('certifications')->nullable();
            $table->json('languages')->nullable();
            $table->decimal('consultation_fee', 10, 2)->default(0);
            $table->decimal('rating', 3, 2)->default(4.5);
            $table->string('location')->nullable();
            $table->json('social_links')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void { Schema::dropIfExists('doctors'); }
};
