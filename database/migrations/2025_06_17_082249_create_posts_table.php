<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('content');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();
            $table->timestamps();

            $table->index('category_id', 'posts_category_idx');
            $table->index('user_id', 'posts_user_idx');

            $table->foreign('category_id', 'posts_category_fk')
                ->on('categories')
                ->references('id');

            $table->foreign('user_id', 'posts_user_idx')
                ->on('users')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
