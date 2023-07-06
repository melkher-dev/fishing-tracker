<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('fish')->insert(
            [
                ['type' => 'Карась'],
                ['type' => 'Тарань'],
                ['type' => 'Бічок'],
                ['type' => 'Лящ'],
                ['type' => 'Краснопер'],
                ['type' => 'Синець'],
                ['type' => 'Окунь'],
                ['type' => 'Короп'],
                ['type' => 'Шкрек'],
                ['type' => 'Сом'],
                ['type' => 'Судак'],
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('fish')->truncate();
    }
};
