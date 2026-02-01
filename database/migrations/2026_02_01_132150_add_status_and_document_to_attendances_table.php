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
        Schema::table('attendances', function (Blueprint $table) {
            /// Status: present (hadir), sick (sakit), permission (izin), dispensation (dispen)


            // Menyimpan nama file/path dokumen bukti (jpg, png, atau pdf)
            $table->string('document_path')->nullable()->after('status');
            
            // Keterangan tambahan jika diperlukan (opsional)
            $table->text('description')->nullable()->after('document_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
                $table->dropColumn(['status', 'document_path', 'description']);
            });
    }
};
