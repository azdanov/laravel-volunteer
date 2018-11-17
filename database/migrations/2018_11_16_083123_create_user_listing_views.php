<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserListingViews extends Migration
{
    public function up(): void
    {
        Schema::create('user_listing_views', static function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('listing_id')->unsigned();
            $table->integer('count')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_listing_views');
    }
}
