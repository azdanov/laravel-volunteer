<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsableToCategoriesTable extends Migration
{
    public function up(): void
    {
        Schema::table('categories', static function (Blueprint $table): void {
            $table->boolean('usable')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('categories', static function (Blueprint $table): void {
            $table->dropColumn('usable');
        });
    }
}
