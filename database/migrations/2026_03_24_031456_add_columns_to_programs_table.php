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
        Schema::table('programs', function (Blueprint $table) {
            // Check if columns don't exist before adding
            if (!Schema::hasColumn('programs', 'judul')) {
                $table->string('judul')->after('id');
            }
            if (!Schema::hasColumn('programs', 'deskripsi')) {
                $table->text('deskripsi')->after('judul');
            }
            if (!Schema::hasColumn('programs', 'foto')) {
                $table->string('foto')->nullable()->after('deskripsi');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['judul', 'deskripsi', 'foto']);
        });
    }
};
