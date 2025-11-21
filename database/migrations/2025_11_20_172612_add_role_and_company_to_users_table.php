<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        if (!Schema::hasColumn('users', 'role_id')) {
            $table->foreignId('role_id')->nullable()->constrained('roles');
        }
        if (!Schema::hasColumn('users', 'company_id')) {
            $table->foreignId('company_id')->nullable()->constrained('companies');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropForeign(['role_id']);
        $table->dropColumn(['role_id', 'company_id']);
        });
    }
};
