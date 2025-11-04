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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // bigint unsigned + primary key
            $table->foreignId('category_id')->constrained('categories'); // 外部キー: categories(id)
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->tinyInteger('gender')->comment('1:男性 2:女性 3:その他');
            $table->string('email', 255);
            $table->string('tel', 255);
            $table->string('address', 255);
            $table->string('building', 255)->nullable(); // NOT NULL指定なしだったのでnullable
            $table->text('detail');
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
