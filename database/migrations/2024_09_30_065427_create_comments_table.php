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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('post_id')
                ->references('id')
                ->on('posts')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('reply_to')
                ->nullable()
                ->references('id')
                ->on('posts')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('comment');
            $table->boolean('is_confirmed')->default(0);
            $table->boolean('is_admin')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
