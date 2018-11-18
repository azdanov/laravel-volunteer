<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    public function up(): void
    {
        Schema::create('listings', static function (Blueprint $table): void {
            $table->increments('id');
            $table->string('title');
            $table->string('body');
            $table->integer('user_id')->unsigned();
            $table->integer('region_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->boolean('live')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('paid')->default(false);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
}
