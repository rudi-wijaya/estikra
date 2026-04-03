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
        if (!Schema::hasTable('prestasis')) {
            Schema::create('prestasis', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->text('keterangan')->nullable();
                $table->string('tahun', 10)->nullable();
                $table->string('foto')->nullable();
                $table->unsignedInteger('urutan')->default(0);
                $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};
