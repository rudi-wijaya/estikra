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
        if (Schema::hasTable('prestasis') && ! Schema::hasColumn('prestasis', 'berita_id')) {
            Schema::table('prestasis', function (Blueprint $table) {
                $table->foreignId('berita_id')->nullable()->unique()->after('id')->constrained('beritas')->cascadeOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('prestasis') && Schema::hasColumn('prestasis', 'berita_id')) {
            Schema::table('prestasis', function (Blueprint $table) {
                $table->dropConstrainedForeignId('berita_id');
            });
        }
    }
};
