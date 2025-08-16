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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false)->after('rol');
            $table->string('phone')->nullable()->after('is_admin');
            $table->string('professional_url')->nullable()->after('phone');
            $table->string('photo_path')->nullable()->after('professional_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_admin', 'phone', 'professional_url', 'photo_path']);
        });
    }
};
