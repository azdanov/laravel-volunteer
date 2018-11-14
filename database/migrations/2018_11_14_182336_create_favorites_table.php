<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    public function up(): void
    {
        Schema::create('favorites', static function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('favorite_id');
            $table->string('favorite_type');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
}
