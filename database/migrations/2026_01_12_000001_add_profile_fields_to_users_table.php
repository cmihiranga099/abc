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
            $table->string('phone', 30)->nullable()->after('email');
            $table->string('address_line', 255)->nullable()->after('phone');
            $table->string('city', 100)->nullable()->after('address_line');
            $table->string('country', 100)->nullable()->after('city');
            $table->string('avatar_path', 255)->nullable()->after('country');
            $table->text('bio')->nullable()->after('avatar_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'address_line',
                'city',
                'country',
                'avatar_path',
                'bio',
            ]);
        });
    }
};
