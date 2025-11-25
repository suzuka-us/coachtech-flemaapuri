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

            // 商品画像（storage に保存するパス）
            $table->string('image')->nullable();

            // 説明文（必要なら）
            $table->text('description')->nullable();

            // 出品者ユーザーID
            $table->unsignedBigInteger('user_id');

            // 購入者ユーザーID（購入されていない場合は null）
            $table->unsignedBigInteger('buyer_id')->nullable();

            // 金額（必要に応じて）
            $table->integer('price')->nullable();

            $table->timestamps();
        });
    }
};
