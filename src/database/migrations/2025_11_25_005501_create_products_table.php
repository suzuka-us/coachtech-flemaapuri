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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // 商品名
            $table->string('name');

            // 金額
            $table->integer('price')->nullable();

            // ブランド
            $table->string('brand')->nullable();

            // 説明文
            $table->text('description')->nullable();

            // 商品画像パス
            $table->string('image')->nullable();

            // 商品状態
            $table->string('condition')->nullable();

            // カテゴリID（外部キー）
            $table->foreignId('category_id')
                ->constrained()
                ->onDelete('cascade');

            // 出品者
            $table->unsignedBigInteger('user_id');

            // 購入者（null 可）
            $table->unsignedBigInteger('buyer_id')->nullable();

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
