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
        Schema::create('post_to_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->index('post_id', 'posts_to_tag_post_id_idx');
            $table->index('tag_id', 'posts_to_tag_tag_id_idx');

            $table->foreign('post_id', 'posts_to_tag_post_id_fk')
                ->on('posts')
                ->references('id');
            $table->foreign('tag_id', 'posts_to_tag_tag_id_fk')
                ->on('tags')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_to_tags');
    }
};
