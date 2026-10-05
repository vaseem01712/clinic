<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('doctors', function(Blueprint $table){
            $table->string('department')->nullable()->after('specialty_id');
            $table->string('license_registration')->nullable()->after('education');
        });
    }
    public function down(): void {
        Schema::table('doctors', function(Blueprint $table){ $table->dropColumn(['department','license_registration']); });
    }
};
